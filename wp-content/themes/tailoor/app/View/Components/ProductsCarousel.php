<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductsCarousel extends Component
{
    public array $productsImages = [
        2050, // Scarpe
        2052, // Borsa
        2054, // Camicia
        2056, // Maglia
        2058, // Divano
    ];

    public array $models = [
        2044, // Scarpe
        2046, // Borsa
        2038, // Camicia
        2040, // Maglia
        2042, // Divano
    ];
    public string $phoneMask;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->productsImages = array_map(fn(int $id) => wp_get_attachment_image($id, [250, 250], false, ['class' => 'mx-auto']), $this->productsImages);
        $this->models = array_map(fn(int $id) => wp_get_attachment_image($id, 'full'), $this->models);
        $this->phoneMask = wp_get_attachment_image(2048, 'full', false, ['class' => 'mx-auto']);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.products-carousel')->with([
            'data' => addslashes(json_encode([
//                'products' => $this->productsImages,
                'models' => $this->models,
                'phoneMask' => $this->phoneMask
            ]))
        ]);
    }
}
