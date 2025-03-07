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
                ],
                'annual' => [
                    'price' => 84,
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/base/20",
                    'label' => __('Try for free', 'sage'),
                ],
            ],
            [
                __('Features you\'ll love', 'sage') => [
                    __('Online and In-Store 3D Configurator', 'sage'),
                    __('E-commerce Module', 'sage'),
                    __('Model Option Management', 'sage'),
                    __('Materials Catalog (up to 10)', 'sage'),
                    __('Up to 100 Yearly orders', 'sage'),
                    __('Dashboard & CRM', 'sage'),

                ],
                __('Commissions & Fees', 'sage') => [
                    __('Orders Fee 1%', 'sage'),
                    __('Payments Fee starting from 0.2%', 'sage'),
                ],
            ],
            false, // Indica se è il piano consigliato,
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
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/essential/10",
                    'label' => __('Try for free', 'sage'),

                ],
                'annual' => [
                    'price' => 279,
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/essential/20",
                    'label' => __('Try for free', 'sage'),

                ],
            ],
            [
                __('Everything included in Starter', 'sage') => [
                    __('Materials Catalog (up to 130)', 'sage'),
                    __('Model Categories (up to 4)', 'sage'),
                    __('Up to 350 Yearly orders', 'sage'),
                    __('Up to 3 Sales Countries', 'sage'),
                    __('Multi Currency', 'sage'),
                    __('Custom Price for Each Sales Country', 'sage'),
                    __('Dashboard Account (up to 3)', 'sage'),

                ],
                __('Commissions & Fees', 'sage') => [
                    __('Orders Fee 0.8%', 'sage'),
                    __('Payments Fee starting from 0.2%', 'sage'),
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
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/professional/10",
                    'label' => __('Try for free', 'sage'),

                ],
                'annual' => [
                    'price' => 679,
                    'href' => "https://onboarding.tailoor.com/$currentLocale/wizard/landing/professional/10",
                    'label' => __('Try for free', 'sage'),
                ],
            ],
            [
                __('Everything included in Starter', 'sage') => [
                    __('Materials Catalog (up to 250)', 'sage'),
                    __('Model Categories (up to 8)', 'sage'),
                    __('Up to 750 Yearly orders', 'sage'),
                    __('Unlimited Sales Countries', 'sage'),
                    __('Dashboard Account (up to 9)', 'sage'),
                    __('Customer Care Module', 'sage'),

                ],
                __('Commissions & Fees', 'sage') => [
                    __('Orders Fee 0.6%', 'sage'),
                    __('Payments Fee starting from 0.2%', 'sage'),
                ],

            ],
            false, // Indica se è il piano consigliato
            __('Professional', 'sage'),
            true,
            true,
        ];
    }

    protected static function plus(): array
    {
        $currentLocale = self::getCurrentLocale();

        return [
            [
                'monthly' => [
                    'price' => null,
                    'href' => '#monthly',
                    'label' => __('Contact Sales', 'sage'),

                ],
                'annual' => [
                    'price' => null,
                    'href' => '#annual',
                    'label' => __('Contact Sales', 'sage'),
                ],
            ],
            [
                __('SEEKING A MORE TAILORED APPROACH FOR YOUR BUSINESS NEEDS?', 'sage') => '',
                __('Are you in need of a customized plan? Fill out the form with your information, and our team of experts will contact you to define the best solution together with a tailored plan designed to achieve your goals.', 'sage') => '',

            ],
            true, // Indica se è il piano consigliato
            __('Tailoor Plus<sup>+</sup>', 'sage'),
            true,
            false,
        ];
    }
}
