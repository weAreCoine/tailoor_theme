<?php

namespace App\View\Components;

use App\Services\PricesService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PriceCard extends Component
{
    public array $features = [];

    public bool $accent = false;

    public bool $enabled = true;

    public bool $hasOnboarding = false;

    public string $translatedTitle = '';

    protected array $prices = [];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $target = ''
    ) {
        $data = PricesService::contentsFor($this->title);
        if ($data !== null) {
            [
                $this->prices,
                $this->features,
                $this->accent,
                $this->translatedTitle,
                $this->enabled,
                $this->hasOnboarding
            ] = $data;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.price-card')->with('prices', addslashes(json_encode($this->prices)));
    }
}
