<?php

namespace App\View\Components\Dashboard\Cart\Parts;

use App\Models\CartProduct;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public CartProduct $item)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.cart.parts.cart-item');
    }
}
