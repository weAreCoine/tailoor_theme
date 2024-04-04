<?php

namespace App\Providers;

use App\Services\AjaxRoutesService;
use App\Services\RouterService;
use Roots\Acorn\Sage\SageServiceProvider;

class ThemeServiceProvider extends SageServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void {
        parent::register();
        new AjaxRoutesService();
        RouterService::register();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void {
        parent::boot();
    }
}
