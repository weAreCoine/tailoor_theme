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

    static public function faq()
    {
        return [
            [
                'question' => __('What is Tailoor used for?', 'sage'),
                'answer' => __('Tailoor is an on-demand SaaS platform that allows you to reach a broader audience by expanding your sales channels in an omnichannel perspective. With Tailoor\'s innovative 3D configurator, you can sell your products online and provide an immersive experience both in-store and online. Based on your needs, we will work together to build the most suitable offer for your requirements.', 'sage'),
            ],
            [
                'question' => __('Why should I opt for this type of service?', 'sage'),
                'answer' => __('The platform can be integrated into your website or e-commerce, offering an innovative system for personalization and customization. This enables you to scale your business and maximize sales, increasing the loyalty of existing customers and reaching new ones.', 'sage'),
            ],
            [
                'question' => __('What is the cost of the platform?', 'sage'),
                'answer' => __('Tailoor is a modulable SaaS platform with costs based on three components: set up, monthly fee, and order fee. Contact us, and we will identify the subscription plan that best suits your needs.', 'sage'),
            ],
            [
                'question' => __('What is the benefit of having a 3D configurator?', 'sage'),
                'answer' => __('Having a 3D configurator allows you to offer your customers a unique and immersive experience, bridging the gap between online and offline. Customers can customize products in real-time using our technology, faithfully highlighting all the strengths and details of your items. For each product category, Tailoor can drive traffic to your e-commerce and ensure an innovative experience, leading to increased orders from your customers.', 'sage'),
            ],
            [
                'question' => __('What types of products can I customize?', 'sage'),
                'answer' => __('With the end-to-end Tailoor platform, there are no limits to the product categories you can customize for your customers. Whatever your business, we will build the most appropriate and effective solution together with you!', 'sage'),
            ],
            [
                'question' => __('How can I customize the platform?', 'sage'),
                'answer' => __('The platform can be personalized according to your preferences in every aspect, starting from logos, fonts, colors, fabrics, and backgrounds. You can choose the product categories to include, define customization options, along with descriptions, model details, and checkout preferences.', 'sage'),
            ],
            [
                'question' => __('How does Tailoor help me optimize and simplify my business?', 'sage'),
                'answer' => __('Thanks to the Tailoor Dashboard, an integrated tool within the platform, you can easily monitor all orders and customer requests and schedule in-store appointments. The dashboard provides numerous benefits, allowing you to manage orders independently, send them directly to your suppliers, and oversee your stores and resources, including pricing, inventory, fabrics, and collections. With Tailoor, it is also easier to monitor customer buying behaviors through CRM and Business Intelligence.', 'sage'),
            ],
            [
                'question' => __('How can I get more information?', 'sage'),
                'answer' => __('We look forward to connecting with you! For more information, request your free demo through the dedicated form or contact us at info@tailoor.com.', 'sage'),
            ],
        ];
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

