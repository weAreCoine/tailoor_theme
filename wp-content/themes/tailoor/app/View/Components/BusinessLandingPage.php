<?php

namespace App\View\Components;

use App\Services\FaqService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BusinessLandingPage extends Component
{
    public array $features;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->features = [
            __('You will have the freedom to choose which product categories you want to make customizable for your customers. You can decide which elements will be customizable, from materials to designs, even down to the smallest details that make your products unique.', 'sage'),
            __('We will take care of digitizing your products, materials, and details in 3D. It will be much easier for your customers to access your entire catalog. Simplify their evaluation and selection process, encouraging the creation of thousands of different configurations.', 'sage'),
            __('With the support of the Dashboard, you can keep track of all orders placed, both online and in-store. Customer data is an incredible asset for your business. You can analyze it to create targeted offers and business strategies, reduce waste through more effective raw material sourcing, and identify sales trends.', 'sage'),
            __('The benefits you will gain are numerous: from significant time savings to the ability to optimize your sales strategies. You can increase your profits by offering your customers a unique shopping experience, thanks to the complete digitization of your business.', 'sage')
        ];

        add_filter('landing_header', [$this, 'header']);
    }

    public function header(): string
    {
        ob_start();
        wp_head('landing');
        return ob_get_clean();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.business-landing-page')->with([
            'features' => $this->features,
            'faqs' => FaqService::landingsFaq(),
            'steps' => addslashes(json_encode([
                [
                    'step' => __('Call', 'sage'),
                    'title' => __('Introductory video call', 'sage'),
                    'description' => __(
                        'After you have filled out the form and requested your free demo, you will receive an email inviting you to choose a suitable day and time for our initial video call. Our goal is to understand your needs and the specifics of your business, so that we can tailor our offer perfectly to your requirements. We will provide you with a detailed overview of the platform\'s functionality and the various subscription plans.',
                        'sage'
                    ),
                ],
                [
                    'step' => __('Analysis', 'sage'),
                    'title' => __('Analysis', 'sage'),
                    'description' => __(
                        'Following the initial call, we will continue to study your business, creating the perfect solution for you. Together, we will analyze the requirements and steps necessary for integration, guiding you through the world of Tailoor and the benefits it offers.',
                        'sage'
                    ),
                ],
                [
                    'step' => __('Support', 'sage'),
                    'title' => __('Active Support', 'sage'),
                    'description' => __(
                        'If you decide to choose Tailoor as a partner to boost your sales and provide your customers with a unique, customized service, you will have our full and ongoing support in platform integration. In the meantime, we will work on rendering your products and materials in 3D, ensuring a perfect match with the original physical prototypes.',
                        'sage'
                    ),
                ],
                [
                    'step' => __('Go!', 'sage'),
                    'title' => __('Let\'s Get Started!', 'sage'),
                    'description' => __(
                        'Once all the necessary operational steps for setting up the online configurator for your business are finalized, we will be ready to launch! With the assistance of the Dashboard, managing orders and customer data will be extremely easy.',
                        'sage'
                    ),
                ],
            ]))
        ]);
    }
}
