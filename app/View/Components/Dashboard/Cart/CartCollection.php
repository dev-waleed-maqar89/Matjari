<?php

namespace App\View\Components\Dashboard\Cart;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartCollection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $carts, public string|null $currentState = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.cart.cart-collection');
    }
}
