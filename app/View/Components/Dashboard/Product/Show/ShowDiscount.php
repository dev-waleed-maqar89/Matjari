<?php

namespace App\View\Components\Dashboard\Product\Show;

use App\Models\Discount;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowDiscount extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Discount $discount)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.product.show.show-discount');
    }
}