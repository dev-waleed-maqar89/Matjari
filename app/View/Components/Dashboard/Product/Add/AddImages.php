<?php

namespace App\View\Components\Dashboard\Product\Add;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AddImages extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Product $product)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.product.add.add-images');
    }
}
