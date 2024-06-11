<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminCartController extends Controller
{
    public function index()
    {
        $currentState = request('state');
        $carts = Cart::when($currentState, function ($query) use ($currentState) {
            return $query->where('state', $currentState);
        })->paginate(25);
        return view('dashboard.cart.index', compact(['carts', 'currentState']));
    }

    public function show($id)
    {
        $cart = Cart::find($id);
        return view('dashboard.cart.show', compact(['cart']));
    }

    public function changeState(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->update(['state' => $request->state]);
        return redirect(route('dashboard.cart.show', $id));
    }
}