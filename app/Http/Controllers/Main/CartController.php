<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Color;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carts = User::find(Auth::id())->carts()->paginate('25');
        return view('main.Cart.index', compact(['carts']));
    }

    public function show($id)
    {
        $user = User::find(Auth::id());
        $cart = Cart::findOrFail($id);
        $products = $cart->products()->paginate(3);
        if (!Gate::allows('can_access', $cart->user_id)) {
            abort(403);
        }
        return view('main.Cart.show', compact(['cart', 'products']));
    }
    public static function store()
    {
        $user = User::find(Auth::id());
        if ($user->pendingCart()) {
            $cart = $user->pendingCart();
        } else {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'state' => 'pending'
            ]);
        }
        return $cart;
    }

    public function approve($id)
    {
        $user = User::find(Auth::id());
        if (!$user->address) {
            return redirect()->back()->withErrors(['address' => 'Add Your address please.']);
        }
        $cart = Cart::findOrFail($id);
        if (!Gate::allows('can_access', $cart->user_id)) {
            abort(403);
        }
        foreach ($cart->products as $product) {
            $product->price = $product->color->newPrice;
            $product->save();
        }
        $cart->state = 'approved';
        $cart->save();
        return back();
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        if (!Gate::allows('can_access', $cart->user_id)) {
            abort(403);
        }
        foreach ($cart->products as $product) {
            $color = $product->color;
            $color->quantity += $product->quantity;
            $color->save();
        }
        $cart->state = 'canceled';
        $cart->save();
        return back();
    }
}