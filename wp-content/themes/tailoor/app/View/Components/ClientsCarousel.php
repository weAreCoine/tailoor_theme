<?php

namespace App\View\Components;

use App\Abstracts\Carousel;

class ClientsCarousel extends Carousel
{
    public function __construct()
    {
        $this->imagesFolderPath = 'images/clients-logos';
        parent::__construct();
    }
}
