<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GoogleTagManager extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $head = true)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.google-tag-manager');
    }
}
