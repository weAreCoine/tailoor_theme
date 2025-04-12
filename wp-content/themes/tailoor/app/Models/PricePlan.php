<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

final class PricePlan
{
    public function __construct(
        public string       $name,
        public float|string $monthlyPrice,
        public float|string $annualPrice,
        public int          $platform3DConfiguratorOnline,
        public int|string   $platform3DConfiguratorInStore,
        public int|string   $platform3DModelCategories,
        public int|string   $platform3DMaterialCatalog,
        public bool         $platform3DOptionCustomizeManager,
        public bool|string  $platformEcommercePlugin,
        public bool         $platformBusinessModelTypeTailoor,
        public bool         $platformDigitalTwin,
        public bool         $platformARExperience,
        public bool         $platformAITailoor,
        public bool         $platformMetaAtelier,
        public bool         $platformNFTIntegration,
        public int|string   $platformFeaturesAccounts,
        public int|string   $platformFeaturesOrdersQuote,
        public string|int   $platformFeaturesCountries,
        public string       $platformFeaturesLanguages,
        public string       $platformFeaturesDashboardCRM,
        public bool         $platformFeaturesMultiCurrency,
        public bool         $platformFeaturesTagManager,
        public bool         $platformFeaturesCustomMarketPricing,
        public bool         $platformFeaturesSizeModule,
        public bool         $platformAnalyticsSalesReport,
        public bool         $platformAnalyticsGoogleAnalytics,
        public string       $platformSupportTechnicalSupport,
        public bool         $platformSupportStoreManagement,
        public bool         $platformSupportCustomerCare,
        public array        $platformAddOns
    )
    {
    }

    static public function getDescriptionFor(string $feature): ?string
    {
        return match ($feature) {
            __('Pay Monthly', 'sage') => null,
            __('Pay Annually (Save 15%)', 'sage') => null,
            __('Online 3D Configurator', 'sage') => __('Online shop configurator', 'sage'),
            __('In-Store 3D Configurator', 'sage') => __('In-store configurator', 'sage'),
            __('Model Categories', 'sage') => __('Configurable Categories', 'sage'),
            __('Material Catalog', 'sage') => __('Digitalization of Materials Included', 'sage'),
            __('3D Model Customize Manager', 'sage') => __('Dashboard for Model Configuration', 'sage'),
            __('E-commerce Plugin Module', 'sage') => __('Shopify and WooCommerce Integration', 'sage'),
            __('Business Model Type Module', 'sage') => __('Sell Online and In-Store', 'sage'),
            __('Digital Twin', 'sage') => __('Brand Digital Twin', 'sage'),
            __('AR Experience', 'sage') => __('Augmented Reality Experience', 'sage'),
            __('AI Tailoor', 'sage') => __('Virtual assistant for the shop', 'sage'),
            __('Meta Atelier', 'sage') => __('Virtual Boutique', 'sage'),
            __('NFT Integration', 'sage') => __('NFC Tags to Make Your Products Phygital', 'sage'),
            __('Accounts', 'sage') => __('Number of Users', 'sage'),
            __('Orders Quote', 'sage') => __('Number of Orders/Year', 'sage'),
            __('Countries', 'sage') => __('Sales countries', 'sage'),
            __('Languages', 'sage') => null,
            __('Dashboard & CRM', 'sage') => __('CRM for Order, Sales, and Marketing Management', 'sage'),
            __('Multi Currency', 'sage') => null,
            __('Tag Manager', 'sage') => __('Product Tagging System for Targeted Searches and Promotions', 'sage'),
            __('Custom Market Pricing', 'sage') => __('Differentiated Price Lists for Sales Markets', 'sage'),
            __('Size Module', 'sage') => __('Size Chart and Custom Fit', 'sage'),
            __('Sales Report', 'sage') => __('Detailed BI Dashboard for Order, Customer, and Sales Analysis', 'sage'),
            __('Google Analytics', 'sage') => __('Integration with Your Google Analytics', 'sage'),
            __('Technical Support', 'sage') => __('Online and AI Technical Support', 'sage'),
            __('Store Management', 'sage') => __('Dedicated Store Manager', 'sage'),
            __('Customer Care', 'sage') => __('Customer Management System', 'sage'),
            __('Add-ons', 'sage') => __('Add-ons', 'sage'),
            __('Appointment Module', 'sage') => __('Appointment Module', 'sage'),
            __('Measurement App', 'sage') => __('Measurement App', 'sage'),
            __('Additional Staff Account', 'sage') => __('Additional Staff Account', 'sage'),
            __('Additional Store Offline', 'sage') => __('Additional Store Offline', 'sage'),
            default => Str::title(Str::replace('_', ' ', Str::snake($feature))),
        };
    }

    static public function getPlans(): Collection
    {
        return collect([
            self::getStarterPlan()->getComparisonData(),
            self::getEssentialPlan()->getComparisonData(),
            self::getProfessionalPlan()->getComparisonData(),
            self::getUnlimitedPlan()->getComparisonData(),
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
                __('3D Model Customize Manager', 'sage') => $this->platform3DOptionCustomizeManager,
                __('Online 3D Configurator', 'sage') => $this->platform3DConfiguratorOnline,
                __('In-Store 3D Configurator', 'sage') => $this->platform3DConfiguratorInStore,
                __('Model Categories', 'sage') => $this->platform3DModelCategories,
                __('Material Catalog', 'sage') => $this->platform3DMaterialCatalog,
            ],
            __('E-Commerce Platform', 'sage') => [
                __('Business Model Type Module', 'sage') => $this->platformBusinessModelTypeTailoor,
                __('E-commerce Plugin Module', 'sage') => $this->platformEcommercePlugin,
            ],
            __('Phygital Experience', 'sage') => [
                __('Digital Twin', 'sage') => $this->platformDigitalTwin,
                __('AR Experience', 'sage') => $this->platformARExperience,
                __('AI Tailoor', 'sage') => $this->platformAITailoor,
                __('Meta Atelier', 'sage') => $this->platformMetaAtelier,
                __('NFT Integration', 'sage') => $this->platformNFTIntegration,
            ],
            __('Features', 'sage') => [
                __('Accounts', 'sage') => $this->platformFeaturesAccounts,
                __('Orders Quote', 'sage') => $this->platformFeaturesOrdersQuote,
                __('Countries', 'sage') => $this->platformFeaturesCountries,
                __('Languages', 'sage') => $this->platformFeaturesLanguages,
                __('Dashboard & CRM', 'sage') => $this->platformFeaturesDashboardCRM,
                __('Custom Market Pricing', 'sage') => $this->platformFeaturesCustomMarketPricing,
                __('Size Module', 'sage') => $this->platformFeaturesSizeModule,
                __('Multi Currency', 'sage') => $this->platformFeaturesMultiCurrency,
                __('Tag Manager', 'sage') => $this->platformFeaturesTagManager,
            ],
            __('Analytics', 'sage') => [
                __('Google Analytics', 'sage') => $this->platformAnalyticsGoogleAnalytics,
                __('Sales Report', 'sage') => $this->platformAnalyticsSalesReport,
            ],
            __('Support', 'sage') => [
                __('Technical Support', 'sage') => $this->platformSupportTechnicalSupport,
                __('Customer Care', 'sage') => $this->platformSupportCustomerCare,
                __('Store Management', 'sage') => $this->platformSupportStoreManagement,
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
            false,
            false,
            false,
            false,
            false,
            1,
            100,
            1,
            __('English +1', 'sage'),
            __('Standard', 'sage'),
            false,
            false,
            true,
            true,
            false,
            true,
            __('Online documentation and AI', 'sage'),
            false,
            false,
            []
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
            30,
            true,
            true,
            true,
            false,
            false,
            false,
            false,
            false,
            3,
            250,
            3,
            __('English +1', 'sage'),
            __('Standard', 'sage'),
            true,
            false,
            true,
            true,
            false,
            true,
            __('Online documentation and AI', 'sage'),
            false,
            false,
            []
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
            50,
            true,
            true,
            true,
            false,
            false,
            false,
            false,
            false,
            9,
            750,
            __('All', 'sage'),
            __('English + 2', 'sage'),
            __('Standard', 'sage'),
            true,
            true,
            true,
            true,
            true,
            true,
            __('Online documentation and AI', 'sage'),
            false,
            true,
            []
        );
    }

    public static function getUnlimitedPlan(): self
    {
        return new self(
            "Essential",
            __('Custom', 'sage'),
            __('Custom', 'sage'),
            1,
            __('Custom', 'sage'),
            __('Custom', 'sage'),
            __('Custom', 'sage'),
            true,
            __('Custom', 'sage'),
            true,
            true,
            true,
            true,
            true,
            true,
            __('Custom', 'sage'),
            __('Custom', 'sage'),
            __('All', 'sage'),
            __('Custom', 'sage'),
            __('Advanced', 'sage'),
            true,
            true,
            true,
            true,
            true,
            true,
            __('Online doc., AI and FTE support', 'sage'),
            true,
            true,
            []
        );
    }
}
