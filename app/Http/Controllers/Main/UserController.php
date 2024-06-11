<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\LoginRequest;
use App\Http\Requests\Main\UserRequest;
use App\Http\Traits\ImageTrait;
use App\Models\ResetPassword;
use App\Models\User;
use App\Models\UserImage;
use App\Rules\PasswordRule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    use ImageTrait;

    public function register()
    {

        return view('main.auth.register');
    }


    public function store(UserRequest $request)
    {

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'address' => $request->address,
            ]
        );
        if ($request->hasFile('image')) {
            $img = $this->singleImageUpload($request->file('image'), 'user', $user->email);
            UserImage::create([
                'user_id' => $user->id,
                'image_id' => $img->id
            ]);
        }
        Auth::login($user);;
        return redirect('/user/' . $user->id);
    }
    public function loginForm()
    {
        return view('main.auth.login');
    }
    public function login(LoginRequest $request)
    {

        $creds = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = Auth::attempt($creds, $request->remember);
        if ($user) {
            return redirect('/');
        } else {
            return redirect()->back()->withErrors(['msg' => 'wrong info']);
        }
    }
    function show($id)
    {
        if (!Gate::allows('can_access', $id)) {
            abort(403);
        }
        $user = User::find($id);
        return view('main.auth.Show', compact(['user']));
    }

    public function edit($id)
    {

        if (!Gate::allows('can_access', $id)) {
            abort(403);
        }
        $user = User::find($id);
        return view('main.auth.edit', compact(['user']));
    }

    function update(Request $request, $id)
    {

        if (!Gate::allows('can_access', $id)) {
            abort(403);
        }
        $user = User::with('images')->find($id);
        $password = $user->password;
        if ($request->has('password')) {
            $password = bcrypt($request->password);
        }
        $user->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'address' => $request->address,
            ]
        );
        if ($request->hasFile('image')) {
            $img = $this->singleImageUpload($request->file('image'), 'user', $user->email);
            if ($user->images) {
                foreach ($user->images as $image) {
                    $image->active = 0;
                    $image->save();
                }
            }
            UserImage::create([
                'user_id' => $user->id,
                'image_id' => $img->id
            ]);
        }
        return redirect('/user/' . $user->id);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function forgetPasswordForm()
    {
        return view('main.auth.forgetPassword');
    }
    public function sendPasswordLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'exists:users,email']
        ]);
        $email = $request->email;
        $token = \Str::random('15');
        $user = ResetPassword::where('email', $email)->first();
        if ($user) {
            $user->delete();
        }
        Mail::send('main.mails.resetPassword', ['token' => $token], function ($msg) use ($email) {
            $msg->to($email);
        });
        ResetPassword::create([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('msg', 'A link was sent to your mail');
    }
    public function resetPasswordForm($token)
    {
        $user = ResetPassword::where('token', $token)->first();
        $date = Carbon::parse($user->created_at);
        $now = Carbon::now();
        $exp = $date->diffInMinutes($now);
        if ($exp <= 15) {
            return view('main.auth.resetPassword', compact(['token']));
        } else {
            return redirect('/forget-password')->with('exp', 'Your token expired');
        }
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email',],
            'password' => ['required', 'confirmed', new PasswordRule]
        ]);
        $email = $request->email;
        $password = $request->password;
        $token = $request->token;
        $record = ResetPassword::where('email', $email)->where('token', $token)->first();
        if (!$record) {
            return redirect('/forget-password')->with('exp', 'wrong info');
        } else {
            $record->delete();
            $user = User::where('email', $email)->first();
            $user->update([
                'email' => $email,
                'password' => $password,
            ]);
            return redirect('/login');
        }
    }
}
