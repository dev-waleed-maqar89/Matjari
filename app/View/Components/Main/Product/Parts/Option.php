<?php

namespace App\View\Components\Main\Product\Parts;

use App\Models\Option as ModelsOption;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Option extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ModelsOption $option)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main.product.parts.option');
    }
}
