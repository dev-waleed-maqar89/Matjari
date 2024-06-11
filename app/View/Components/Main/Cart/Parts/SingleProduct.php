<?php

namespace App\View\Components\Main\Cart\Parts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $product, public $cart)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main.cart.parts.single-product');
    }
}