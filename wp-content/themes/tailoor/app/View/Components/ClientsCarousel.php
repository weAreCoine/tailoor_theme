<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ClientsCarousel extends Component
{
    public Collection $filenames;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->filenames = collect(scandir(resource_path('images/clients-logos')));
        $this->filenames = $this->filenames->merge($this->filenames);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.clients-carousel');
    }
}
