<?php

namespace App\Services;

use Illuminate\Support\Str;

class PricesService
{
    public static ?string $currentLocale = null;

    public static function contentsFor(string $plan)
    {
        $method = Str::camel($plan);
        if (method_exists(self::class, $method)) {
            return self::$method();
        }

        return null;
    }

    public static function faq(): array
    {
        return FaqService::generalFaqs();
    }

    protected static function starter(): array
    {
        $currentLocale = self::getCurrentLocale();

        return [
            [
                'monthly' => [
                    'price' => 99,
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/base/10",
                    'label' => __('Try for free', 'sage'),
                    //                    'href' => '#monthly',
                    //                    'label' => __('Get a free demo', 'sage'),

                ],
                'annual' => [
                    'price' => 84,
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/base/20",
                    'label' => __('Try for free', 'sage'),
                    //                    'href' => '#annual',
                    //                    'label' => __('Get a free demo', 'sage'),
                ],
            ],
            [
                __('Platform free trial (10 days)', 'sage') => '',
                __('3D Platform', 'sage') => [
                    __('Online and In-Store Configurator', 'sage'),
                    __('Materials Catalog (up to 10)', 'sage'),
                    __('1 Model Categories', 'sage'),
                    __('Model Option Management', 'sage'),
                ],
                __('E-commerce Platform', 'sage') => [
                    __('E-commerce Module', 'sage'),
                    __('In-store Module', 'sage'),
                    __('Order Fee 1%', 'sage'),
                    __('Payments Fee starting from 0.2%', 'sage'),
                ],
                __('Platform Features', 'sage') => [
                    __('1 Dashboard account', 'sage'),
                    __('Up to 100 Yearly orders', 'sage'),
                    __('1 Sales Country', 'sage'),
                    __('CRM', 'sage'),
                ],
                //                __('1 Digital Twin', 'sage') => '',
                __('Platform Analytics', 'sage') => [
                    __('Google Analytics', 'sage'),
                ],
                __('Platform Support', 'sage') => [
                    __('Technical support', 'sage'),
                ],
            ],
            true, // Indica se è il piano consigliato,
            __('Starter', 'sage'),
            true, // Indica se il piano è attivo
            true, // Se vero, il piano è vendibile direttamente, se falso compare il form di contatto
        ];
    }

    public static function getCurrentLocale(): string
    {
        if (self::$currentLocale === null) {
            self::$currentLocale = wpml_get_current_language();
        }

        return self::$currentLocale;
    }

    protected static function essential(): array
    {

        $currentLocale = self::getCurrentLocale();

        return [
            [
                'monthly' => [
                    'price' => 329,
                    //                    'href' => '#monthly',
                    //                    'label' => __('Get a free demo', 'sage'),
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/essential/10",
                    'label' => __('Try for free', 'sage'),

                ],
                'annual' => [
                    'price' => 279,
                    //                    'href' => '#annual',
                    //                    'label' => __('Get a free demo', 'sage'),
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/essential/20",
                    'label' => __('Try for free', 'sage'),

                ],
            ],
            [
                __('Platform free trial (10 days)', 'sage') => '',
                __('3D Platform', 'sage') => [
                    __('Online and In-Store Configurator', 'sage'),
                    __('Materials Catalog (up to 130)', 'sage'),
                    __('Up to 4 Model Categories', 'sage'),
                    __('Model Option Management', 'sage'),
                ],
                __('E-commerce Platform', 'sage') => [
                    __('E-commerce Module', 'sage'),
                    __('In-store Module', 'sage'),
                    __('Order Fee 0.8%', 'sage'),
                    __('Payments Fee starting from 0.2%', 'sage'),
                    __('Shopify and Woocommerce Integration', 'sage'),
                ],
                __('Platform Features', 'sage') => [
                    __('Up to 3 Dashboard account', 'sage'),
                    __('Up to 350 Yearly orders', 'sage'),
                    __('Up to 3 Sales Countries', 'sage'),
                    __('Multi Currency', 'sage'),
                    __('Custom Price for Each Sales Country', 'sage'),
                    __('CRM', 'sage'),
                ],
                //                __('1 Digital Twin', 'sage') => '',
                __('Platform Analytics', 'sage') => [
                    __('Google Analytics', 'sage'),
                ],
                __('Platform Support', 'sage') => [
                    __('Technical support', 'sage'),
                ],

            ],
            false, // Indica se è il piano consigliato
            __('Essential', 'sage'),
            true,
            true,

        ];
    }

    protected static function professional(): array
    {
        $currentLocale = self::getCurrentLocale();

        return [
            [
                'monthly' => [
                    'price' => 799,
                    //                    'href' => '#monthly',
                    //                    'label' => __('Get a free demo', 'sage'),
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/professional/10",
                    'label' => __('Try for free', 'sage'),

                ],
                'annual' => [
                    'price' => 679,
                    //                    'href' => '#annual',
                    //                    'label' => __('Get a free demo', 'sage'),
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/professional/10",
                    'label' => __('Try for free', 'sage'),
                ],
            ],
            [
                __('Platform free trial (10 days)', 'sage') => '',
                __('3D Platform', 'sage') => [
                    __('Online and In-store Configurator', 'sage'),
                    __('Materials Catalog (up to 250)', 'sage'),
                    __('Up to 8 Model Categories', 'sage'),
                    __('Model Option Management', 'sage'),
                ],
                __('E-commerce Platform', 'sage') => [
                    __('E-commerce Module', 'sage'),
                    __('In-store Module', 'sage'),
                    __('Order Fee 0.6%', 'sage'),
                    __('Payments Fee starting from 0.2%', 'sage'),
                    __('Shopify and Woocommerce Integration', 'sage'),
                ],
                __('Platform Features', 'sage') => [
                    __('Up to 9 Dashboard Account', 'sage'),
                    __('Up to 750 Yearly orders', 'sage'),
                    __('Unlimited Sales Countries', 'sage'),
                    __('Multi-currency', 'sage'),
                    __('Custom Pricing for Each Sales Country', 'sage'),
                    __('CRM', 'sage'),
                ],
                //                __('1 Digital Twin', 'sage') => '',
                __('Platform Analytics', 'sage') => [
                    __('Google Analytics', 'sage'),
                    __('Tailoor BI DASHBOARD', 'sage'),
                ],
                __('Platform Support', 'sage') => [
                    __('Technical support', 'sage'),
                    __('Customer Care Module', 'sage'),
                ],
            ],
            false, // Indica se è il piano consigliato
            __('Professional', 'sage'),
            true,
            true,
        ];
    }
}
