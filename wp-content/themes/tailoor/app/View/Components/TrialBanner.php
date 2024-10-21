<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TrialBanner extends Component
{
    public string $title;

    public string $subtitle;

    protected array $titles;

    protected array $subtitles;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->titles = [
            __('What products do you want your customers to customize? We\'ve got you %scovered%s.', 'sage'),
        ];

        $this->title = sprintf($this->titles[array_rand($this->titles)], '<span class="font-serif italic">', '</span>');
        $this->subtitles = [
            __('Enable your customers to personalize your items thanks to our innovative 3D configurator powered by AI. Promote a <span class="font-serif italic whitespace-nowrap">made to order</span> and customized approach. Say goodbye to returns and warehouse problems.', 'sage'),
        ];
        $this->subtitle = $this->subtitles[array_rand($this->subtitles)];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.trial-banner');
    }
}
