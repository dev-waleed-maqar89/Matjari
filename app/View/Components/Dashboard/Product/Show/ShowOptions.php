<?php

namespace App\View\Components\Dashboard\Product\Show;

use App\Models\Option;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowOptions extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Option $option)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.product.show.show-options');
    }
}
