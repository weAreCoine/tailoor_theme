<?php

namespace App\Providers;

use App\Traits\Singleton;
use App\View\Components\BusinessLandingPage;

final class ShortcodesProvider
{
    use Singleton;

    protected array $shortcodes = [];

    public function __construct()
    {

        $this->shortcodes = [
            'landing_business' => [new BusinessLandingPage(), 'render']
        ];

        $this->shortcodes = apply_filters('tailoor_shortcodes', $this->shortcodes);
        $this->make();
    }

    protected function make(): void
    {
        foreach ($this->shortcodes as $tag => $callable) {
            add_shortcode($tag, $callable);
        }
    }
}
