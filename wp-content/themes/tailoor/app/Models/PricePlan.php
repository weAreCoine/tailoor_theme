<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

final class PricePlan
{
    public function __construct(
        public string     $name,
        public float      $monthlyPrice,
        public float      $annualPrice,
        public int        $platform3DConfiguratorOnline,
        public int        $platform3DConfiguratorInStore,
        public int        $platform3DModelCategories,
        public int        $platform3DMaterialCatalog,
        public bool       $platform3DOptionCustomizeManager,
        public bool       $platformEcommercePlugin,
        public bool       $platformBusinessModelTypeTailoor,
        public bool       $platformDigitalTwin,
        public bool       $platformARExperience,
        public bool       $platformAITailoor,
        public bool       $platformMetaAtelier,
        public bool       $platformNFTIntegration,
        public int        $platformFeaturesAccounts,
        public int        $platformFeaturesOrdersQuote,
        public string|int $platformFeaturesCountries,
        public string     $platformFeaturesLanguages,
        public string     $platformFeaturesDashboardCRM,
        public bool       $platformFeaturesMultiCurrency,
        public bool       $platformFeaturesTagManager,
        public bool       $platformFeaturesCustomMarketPricing,
        public bool       $platformFeaturesSizeModule,
        public bool       $platformAnalyticsSalesReport,
        public bool       $platformAnalyticsGoogleAnalytics,
        public string     $platformSupportTechnicalSupport,
        public bool       $platformSupportStoreManagement,
        public bool       $platformSupportCustomerCare,
        public array      $platformAddOns
    )
    {
    }

    static public function getLabelFor(string $property): string
    {
        return match ($property) {
            'name' => '',
            'platform3DConfiguratorOnline' => __('Online 3D Configurator', 'sage'),
            'platform3DConfiguratorInStore' => __('In-Store 3D Configurator', 'sage'),
            'platform3DModelCategories' => __('Model Categories', 'sage'),
            'platform3DMaterialCatalog' => __('Material Catalog', 'sage'),
            'platform3DOptionCustomizeManager' => __('Customize Manager', 'sage'),
            'platformEcommercePlugin' => __('E-commerce Plugin', 'sage'),
            'platformBusinessModelTypeTailoor' => __('Business Model Type', 'sage'),
            'platformDigitalTwin' => __('Digital Twin', 'sage'),
            'platformARExperience' => __('AR Experience', 'sage'),
            'platformAITailoor' => __('AI Tailoor', 'sage'),
            'platformMetaAtelier' => __('Meta Atelier', 'sage'),
            'platformNFTIntegration' => __('NFT Integration', 'sage'),
            'platformFeaturesAccounts' => __('Accounts', 'sage'),
            'platformFeaturesOrdersQuote' => __('Orders Quote', 'sage'),
            'platformFeaturesCountries' => __('Countries', 'sage'),
            'platformFeaturesLanguages' => __('Languages', 'sage'),
            'platformFeaturesDashboardCRM' => __('Dashboard & CRM', 'sage'),
            'platformFeaturesMultiCurrency' => __('Multi Currency', 'sage'),
            'platformFeaturesTagManager' => __('Tag Manager', 'sage'),
            'platformFeaturesCustomMarketPricing' => __('Custom Market Pricing', 'sage'),
            'platformFeaturesSizeModule' => __('Size Module', 'sage'),
            'platformAnalyticsSalesReport' => __('Sales Report', 'sage'),
            'platformAnalyticsGoogleAnalytics' => __('Google Analytics', 'sage'),
            'platformSupportTechnicalSupport' => __('Technical Support', 'sage'),
            'platformSupportStoreManagement' => __('Store Management', 'sage'),
            'platformSupportCustomerCare' => __('Customer Care', 'sage'),
            'platformAddOns' => __('Add-ons', 'sage'),
            'appointmentModule' => __('Appointment Module', 'sage'),
            'measurementApp' => __('Measurement App', 'sage'),
            'additionalStaffAccount' => __('Additional Staff Account', 'sage'),
            'additionalStoreOffline' => __('Additional Store Offline', 'sage'),
            default => Str::title(Str::replace('_', ' ', Str::snake($property)))
        };
    }

    static public function getPlans(): Collection
    {
        return collect([
            self::getStarterPlan()->getComparisonData(),
            self::getEssentialPlan()->getComparisonData(),
            self::getProfessionalPlan()->getComparisonData(),
        ]);
    }

    public function getComparisonData(): array
    {
        return [
            __('Pricing') => [
                __('Pay Monthly', 'sage') => $this->monthlyPrice,
                __('Pay Annually (Save 15%)', 'sage') => $this->annualPrice,
            ],
            __('Platform 3D', 'sage') => [
                __('Online 3D Configurator', 'sage') => $this->platform3DConfiguratorOnline,
                __('In-Store 3D Configurator', 'sage') => $this->platform3DConfiguratorInStore,
                __('Model Categories', 'sage') => $this->platform3DModelCategories,
                __('Material Catalog', 'sage') => $this->platform3DMaterialCatalog,
            ],
            __('E-Commerce Platform', 'sage') => [
                __('E-commerce Plugin Module', 'sage') => $this->platformEcommercePlugin,
                __('Business Model Type Module', 'sage') => $this->platformBusinessModelTypeTailoor,
            ],
            __('Phygital Experience', 'sage') => [
                __('Digital Twin', 'sage') => $this->platformDigitalTwin,
                __('AR Experience', 'sage') => $this->platformARExperience ?: __('Only for Plus plan', 'sage'),
                __('AI Tailoor', 'sage') => $this->platformAITailoor ?: __('Only for Plus plan', 'sage'),
                __('Meta Atelier', 'sage') => $this->platformMetaAtelier ?: __('Only for Plus plan', 'sage'),
                __('NFT Integration', 'sage') => $this->platformNFTIntegration ?: __('Only for Plus plan', 'sage'),
            ],
            __('Features', 'sage') => [
                __('Accounts', 'sage') => $this->platformFeaturesAccounts,
                __('Orders Quote', 'sage') => $this->platformFeaturesOrdersQuote,
                __('Countries', 'sage') => $this->platformFeaturesCountries,
                __('Languages', 'sage') => $this->platformFeaturesLanguages,
                __('Dashboard & CRM', 'sage') => $this->platformFeaturesDashboardCRM,
                __('Multi Currency', 'sage') => $this->platformFeaturesMultiCurrency,
                __('Tag Manager', 'sage') => $this->platformFeaturesTagManager,
                __('Custom Market Pricing', 'sage') => $this->platformFeaturesCustomMarketPricing,
                __('Size Module', 'sage') => $this->platformFeaturesSizeModule,
            ],
            __('Analytics', 'sage') => [
                __('Sales Report', 'sage') => $this->platformAnalyticsSalesReport,
                __('Google Analytics', 'sage') => $this->platformAnalyticsGoogleAnalytics,
            ],
            __('Support', 'sage') => [
                __('Technical Support', 'sage') => $this->platformSupportTechnicalSupport,
                __('Store Management', 'sage') => $this->platformSupportStoreManagement ?: __('Only for Plus plan', 'sage'),
                __('Customer Care', 'sage') => $this->platformSupportCustomerCare,
            ]
        ];

    }

    public static function getStarterPlan(): self
    {
        return new self(
            __('Starter', 'sage'),
            99,
            84,
            1,
            1,
            1,
            10,
            true,
            false,
            true,
            true,
            false,
            false,
            false,
            false,
            1,
            100,
            1,
            "English + 1",
            "Standard",
            false,
            false,
            true,
            true,
            false,
            true,
            "Online documentation + AI",
            false,
            false,
            [
                "appointmentModule" => 18.99,
                "measurementApp" => 41.90,
                "additionalStaffAccount" => 41.90,
                "additionalStoreOffline" => 83.99
            ]
        );
    }

    public static function getEssentialPlan(): self
    {
        return new self(
            "Essential",
            329,
            279,
            1,
            1,
            4,
            130,
            true,
            true,
            true,
            true,
            false,
            false,
            false,
            false,
            3,
            250,
            3,
            "English + 1",
            "Standard",
            true,
            false,
            true,
            true,
            false,
            true,
            "Online documentation + AI",
            false,
            false,
            [
                "appointmentModule" => 18.99,
                "measurementApp" => 41.90,
                "additionalStaffAccount" => 41.90,
                "additionalStoreOffline" => 83.99
            ]
        );
    }

    public static function getProfessionalPlan(): self
    {
        return new self(
            "Professional",
            799,
            679,
            1,
            3,
            8,
            250,
            true,
            true,
            true,
            true,
            false,
            false,
            false,
            false,
            9,
            750,
            "All",
            "English + 2",
            "Standard",
            true,
            true,
            true,
            true,
            true,
            true,
            "Online documentation + AI",
            false,
            true,
            [
                "appointmentModule" => 45.99,
                "measurementApp" => 87.50,
                "additionalStaffAccount" => 41.90,
                "additionalStoreOffline" => 83.99
            ]
        );
    }
}
