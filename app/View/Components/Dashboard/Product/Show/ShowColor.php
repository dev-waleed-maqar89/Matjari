<?php

namespace App\View\Components\Dashboard\Product\Show;

use App\Models\Color;
use App\Models\Size;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowColor extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Color $color, public Size $size)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.product.show.show-color');
    }
}
