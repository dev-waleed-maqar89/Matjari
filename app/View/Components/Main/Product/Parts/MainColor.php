<?php

namespace App\View\Components\Main\Product\Parts;

use App\Models\Color;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainColor extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Color $mainColor)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main.product.parts.main-color');
    }
}
