<?php

/**
 * Theme filters.
 */

namespace App;

use App\Http\Controllers\RequestFormController;
use App\Services\HomeService;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});
add_filter('ajax_routes', fn(array $routes) => array_merge([
    'request_form' => [RequestFormController::class, 'submit']
], $routes));

add_filter('get_home_tabs_labels', [HomeService::class, 'homeTabsLabels']);

add_filter('get_home_tabs_contents', [HomeService::class, 'homeTabsContent']);
add_filter('tailoor_navigation', function (string $defaultNavigation, string $currentUrl): string {
    return match (true) {
        str_contains($currentUrl, '/pricing') => 'primary_navigation',
        default => $defaultNavigation
    };
}, 10, 2);
