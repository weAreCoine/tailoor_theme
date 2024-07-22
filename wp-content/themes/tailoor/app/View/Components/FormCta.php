<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormCta extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $onPage = false)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-cta')->with([
            'url' => $this->onPage ? '#prices__table' : match (getCurrentLanguage()) {
                'it' => url('it/pricing'),
                default => url('pricing')
            },
        ]);
    }
}
