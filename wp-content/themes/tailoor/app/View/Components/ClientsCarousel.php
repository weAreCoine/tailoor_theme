<?php

namespace App\View\Components;

use App\Abstracts\Carousel;

class ClientsCarousel extends Carousel
{
    public string $id = 'clients-carousel';

    public string $imagesFolderPath = 'images/clients-logos';
}
