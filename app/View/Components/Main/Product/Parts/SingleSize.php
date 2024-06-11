<?php

namespace App\View\Components\Main\product\Parts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleSize extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $product, public $size, public $mainColor)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main.product.parts.single-size');
    }
}