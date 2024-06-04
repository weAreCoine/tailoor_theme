<?php

namespace App\View\Components;

use App\Abstracts\Carousel;

class PressCarousel extends Carousel
{
    public function __construct()
    {
        $this->imagesFolderPath = 'images/press-logos';
        parent::__construct();
    }
}
