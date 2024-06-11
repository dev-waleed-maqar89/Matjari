<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::get()->sortByDesc(function ($record) {
            switch ($record->role) {
                case 'supervisor':
                    return 3;
                case 'admin':
                    return 2;
                case 'moderator':
                    return 1;
                default:
                    return 0;
            }
        });
        return view('dashboard.user.index', compact(['users']));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.user.show', compact(['user']));
    }
    public function makeAdmin($id)
    {
        $user = User::find($id);
        Admin::create(
            [
                'user_id' => $id,
                'role' => 'moderator'
            ]
        );
        return back();
    }

    public function changeRole(Request $request, $id)
    {
        $user = User::find($id);
        $admin = $user->adminAcount()->first();
        if ($admin->role != 'supervisor') {
            if ($request->role === 'remove') {
                $admin->delete();
            } else {
                $admin->role = $request->role;
                $admin->save();
            }
        }
        return back();
    }
}
