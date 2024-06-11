<?php

namespace App\View\Components\Dashboard\Cart;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartRow extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Cart $cart, public string|null $currentState)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.cart.cart-row');
    }
}
