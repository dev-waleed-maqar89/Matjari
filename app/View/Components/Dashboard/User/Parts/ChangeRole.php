<?php

namespace App\View\Components\Dashboard\User\Parts;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChangeRole extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.user.parts.change-role');
    }
}