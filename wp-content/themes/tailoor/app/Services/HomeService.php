<?php

namespace App\Services;

class HomeService
{
    static public function homeTabsLabels(): array
    {
        return [
            __('Your customers can choose a model from those available', 'sage'),
            __('Select the material and all possible customizations', 'sage'),
            __('Configure the product with all its details', 'sage'),
            __('Finalize the order and make the purchase', 'sage')
        ];
    }

    static public function homeTabsContent(): array
    {
        return array_map(function (array $content) {
            $image = wp_get_attachment_image($content['imageID'], 'full', false, ['alt' => 'Tailoor tab image content', 'class' => 'h-full w-auto md:h-auto md:w-full mx-auto']);
            return <<<HTML
            <p>{$content['p']}</p>
            <div class="mt-6 md:mt-0 aspect-[76/100]">$image</div>
            HTML;
        }, [
            [
                'imageID' => 2026,
                'p' => __('You will be able to choose which product categories you want your customers to customize by uploading your product catalog. The 3D visualization of the product will be visible in real-time.', 'sage')
            ],
            [
                'imageID' => 2028,
                'p' => __('All the materials you want to include in the configurator will be digitally rendered by us, offering your customers a wide range of options.', 'sage')
            ],
            [
                'imageID' => 2030,
                'p' => __('Every detail can be customized, offering your customers a unique result, entirely created by and for them.', 'sage')
            ],
            [
                'imageID' => 2032,
                'p' => __('Once the order is finalized, you have two options: allow your customers to receive the product at home or enable them to schedule an appointment at your store to review the final details of their purchase together.', 'sage')
            ],
        ]);
    }
}
