<?php

namespace App\Services;

use Illuminate\Support\Str;

class PricesService
{
    public static function contentsFor(string $plan)
    {
        $method = Str::camel($plan);
        if (method_exists(self::class, $method)) {
            return self::$method();
        }

        return null;
    }

    static public function faq(): array
    {
        return FaqService::generalFaqs();
    }

    static protected function starter(): array
    {
        return [
            [
                'monthly' => [
                    'price' => 99,
                    'href' => 'https://onboarding-staging.tailoor.com/it/wizard/landing/base/10',
                    'label' => __('Try for free', 'sage'),

                ],
                'annual' => [
                    'price' => 84,
                    'href' => 'https://onboarding-staging.tailoor.com/it/wizard/landing/base/20',
                    'label' => __('Try for free', 'sage'),
                ]
            ],
            [
                __('Platform free trial (10 days)', 'sage') => '',
                __('3D Platform', 'sage') => [
                    __('Online and In-Store Configurator', 'sage'),
                    __('Materials Catalog (up to 10)', 'sage'),
                    __('Model Categories x 1', 'sage'),
                    __('Model Option Management', 'sage'),
                ],
                __('E-commerce Platform', 'sage') => [
                    __('E-commerce Module', 'sage'),
                    __('Drive to Store Module', 'sage'),
                    __('Order Fee 1%', 'sage'),
                    __('Payments Fee starting from 0.2%', 'sage'),
                ],
                __('Platform Features', 'sage') => [
                    __('Dashboard account x 1', 'sage'),
                    __('Monthly orders up to 100', 'sage'),
                    __('Sales Countries x 1', 'sage'),
                    __('CRM', 'sage')
                ],
                __('1 Digital Twin', 'sage') => '',
                __('Platform Analytics', 'sage') => [
                    __('Google Analytics', 'sage')
                ],
                __('Platform Support', 'sage') => [
                    __('Technical support', 'sage')
                ],
            ],
            true, // Indica se è il piano consigliato,
            __('Starter', 'sage'),
            true,
            true,
        ];
    }

    static protected function essential(): array
    {
        return [
            [
                'monthly' => [
                    'price' => 329,
                    'href' => '#monthly',
                    'label' => __('Get in touch', 'sage'),
                ],
                'annual' => [
                    'price' => 279,
                    'href' => '#annual',
                    'label' => __('Get in touch', 'sage'),
                ]
            ],
            [
                __('Platform free trial (10 days)', 'sage') => '',
                __('3D Platform', 'sage') => [
                    __('Online and In-Store Configurator', 'sage'),
                    __('Materials Catalog (up to 130)', 'sage'),
                    __('Model Categories x 4', 'sage'),
                    __('Model Option Management', 'sage'),
                ],
                __('E-commerce Platform', 'sage') => [
                    __('E-commerce Module', 'sage'),
                    __('Drive to Store Module', 'sage'),
                    __('Order Fee 0.8%', 'sage'),
                    __('Payments Fee starting from 0.2%', 'sage'),
                    __('Shopify and Woocommerce Integration', 'sage')
                ],
                __('Platform Features', 'sage') => [
                    __('Dashboard account x 3', 'sage'),
                    __('Monthly orders up to 250', 'sage'),
                    __('Sales Countries x 3', 'sage'),
                    __('Multi Currency', 'sage'),
                    __('Custom Price for Each Sales Country', 'sage'),
                    __('CRM', 'sage')
                ],
                __('1 Digital Twin', 'sage') => '',
                __('Platform Analytics', 'sage') => [
                    __('Google Analytics', 'sage')
                ],
                __('Platform Support', 'sage') => [
                    __('Technical support', 'sage')
                ],

            ],
            false, // Indica se è il piano consigliato
            __('Essential', 'sage'),
            true,
            false,

        ];
    }

    static protected function professional(): array
    {
        return [
            [
                'monthly' => [
                    'price' => 799,
                    'href' => '#monthly',
                    'label' => __('Get in touch', 'sage'),
                ],
                'annual' => [
                    'price' => 679,
                    'href' => '#annual',
                    'label' => __('Get in touch', 'sage'),
                ]
            ],
            [
                __('Platform free trial (10 days)', 'sage') => '',
                __('3D Platform', 'sage') => [
                    __('Online and In-store Configurator', 'sage'),
                    __('Materials Catalog (up to 250)', 'sage'),
                    __('Model Categories x 8', 'sage'),
                    __('Model Option Management', 'sage')
                ],
                __('E-commerce Platform', 'sage') => [
                    __('E-commerce Module', 'sage'),
                    __('Drive to Store Module', 'sage'),
                    __('Order Fee 0.6%', 'sage'),
                    __('Payments Fee starting from 0.2%', 'sage'),
                    __('Shopify and Woocommerce Integration', 'sage')
                ],
                __('Platform Features', 'sage') => [
                    __('Dashboard Account x 9', 'sage'),
                    __('Monthly Orders up to 750', 'sage'),
                    __('Unlimited Sales Countries', 'sage'),
                    __('Multi-currency', 'sage'),
                    __('Custom Pricing for Each Sales Country', 'sage'),
                    __('CRM', 'sage')
                ],
                __('1 Digital Twin', 'sage') => '',
                __('Platform Analytics', 'sage') => [
                    __('Google Analytics', 'sage'),
                    __('Tailoor BI DASHBOARD', 'sage')
                ],
                __('Platform Support', 'sage') => [
                    __('Technical support', 'sage'),
                    __('Customer Care Module', 'sage')
                ],
            ],
            false, // Indica se è il piano consigliato
            __('Professional', 'sage'),
            true,
            false,
        ];
    }
}

