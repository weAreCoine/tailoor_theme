<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Il nome della modale deve essere inserito come modalName nell'evento Javascript che la richiede. In questo modo possiamo
 * avere più modali in pagina.
 */
class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $visible = false, public string $name = '', public string $title = '')
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
