<?php

/**
 * Theme setup.
 */

namespace App;

use WP_Scripts;
use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue()->localize('tailoor', [
        'needAnimations' => is_front_page(),
    ]);
//    if (is_front_page()) {
//        bundle('home')->enqueue();
//    }
    bundle('fontawesome')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.2
     *
     * @link htt4ps://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'home_navigation' => __('Home Navigation', 'sage'),
        'landing_navigation' => __('Landings Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Deletes flashed elements after they have finished their available request cycles.
 * Note that the first decrement occurs at shutdown of the session that sets the key, so.
 * For a single session flash I have to get to a count of -1.
 */
add_action('shutdown', function () {
    foreach ($_SESSION['counts'] ?? [] as $key => $count) {
        if ($count === null || $count < 0) {
            unset($_SESSION['counts'][$key], $_SESSION[$key]);
        }
        $_SESSION['counts'][$key]--;
    }
});
/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
            'name' => __('Primary', 'sage'),
            'id' => 'sidebar-primary',
        ] + $config);

    register_sidebar([
            'name' => __('Footer', 'sage'),
            'id' => 'sidebar-footer',
        ] + $config);
});


add_action('wp_default_scripts', function (WP_Scripts $scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            $script->deps = array_diff($script->deps, ['jquery-migrate']);
        }
    }
});


add_action('admin_menu', function () {
    add_menu_page(__(get_bloginfo('name') . ' > Console', 'coine'), __('Console', 'coine'), 'manage_options', 'console', function () {
        echo '<h1 style="margin-bottom: 2rem">Console</h1>';
        require_once resource_path('views/console/console.php');
    }, 'dashicons-shortcode', 45);
}, 99);

/**
 * Close sessions before http requests
 */
add_action('pre_http_request', function ($preempt, $args, $url) {
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_write_close();
    }
    return $preempt; // Non alterare la risposta predefinita
}, 10, 3);

/**
 * Init session if it doesn't exists
 */
add_action('init', function () {
    if (!session_id()) {
        session_start();
    }
});

/**
 * Close session
 * @return void
 */
function end_session(): void
{

    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );

    session_destroy();
}

add_action('wp_logout', 'end_session');

// Per il momento utilizzo la funzione in questo modo perché altrimenti non viene riconosciuta come dichiarata.
add_action('wp_login', function (): void {

    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );

    session_destroy();
});


