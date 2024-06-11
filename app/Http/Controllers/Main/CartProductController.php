<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Color;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    public function store(Request $request)
    {
        $color = Color::find($request->color);
        $request->validate([
            'color' => ['required', 'exists:colors,id'],
            'quantity' => ['required', 'integer', 'max:' . $color->quantity, 'min:1']
        ]);
        $cart = CartController::store();
        $cartProduct = CartProduct::where('cart_id', $cart->id)->where('color_id', $request->color)->first();
        if ($cartProduct) {
            $cartProduct->quantity += $request->quantity;
            $cartProduct->save();
        } else {
            CartProduct::create([
                'cart_id' => $cart->id,
                'color_id' => $request->color,
                'quantity' => $request->quantity,
                'price' => 0 // price will be changed as the customer approve the cart
            ]);
        }
        $color->quantity -= $request->quantity;
        $color->save();
        return redirect('/cart/' . $cart->id);
    }

    public function update(Request $request, $id)
    {
        $cartProduct = CartProduct::find($id);
        $oldQ = $cartProduct->quantity;
        $newQ = $request->quantity;
        $color = $cartProduct->Color;
        $diff = $oldQ - $newQ;
        $request->validate(
            ['quantity' => ['required', 'integer', 'min:1', 'max:' . $color->quantity + $oldQ]]
        );
        $color->quantity += $diff;
        $color->save();
        $cartProduct->quantity = $newQ;
        $cartProduct->save();
        return back();
    }

    public function destroy($id)
    {
        $cartProduct = CartProduct::find($id);
        if ($cartProduct) {
            $color = $cartProduct->color;
            $color->quantity += $cartProduct->quantity;
            $color->save();
            $cartProduct->delete();
        }
        return back();
    }
}