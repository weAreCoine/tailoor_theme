<?php

/**
 * Theme filters.
 */

namespace App;

use App\Http\Controllers\RequestFormController;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter( 'excerpt_more', function () {
    return sprintf( ' &hellip; <a href="%s">%s</a>', get_permalink(), __( 'Continued', 'sage' ) );
} );
add_filter( 'ajax_routes', fn( array $routes ) => array_merge( [
    'request_form' => [ RequestFormController::class, 'submit' ]
], $routes ) );


