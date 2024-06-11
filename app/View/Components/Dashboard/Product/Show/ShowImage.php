<?php

namespace App\View\Components\Dashboard\Product\Show;

use App\Models\Image;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowImage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Image $image)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.product.show.show-image');
    }
}