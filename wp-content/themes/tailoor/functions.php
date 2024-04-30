<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

use App\Policies\GDPR;

if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (!function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (!locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
            /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/**
 * Gets the current language.
 *
 * Retrieves the current language by checking if it has been previously set.
 * If the language has not been set, it uses the 'wpml_current_language' filter.
 * If the filter returns null or is not set, it defaults to 'en' (English).
 *
 * @return string The current language.
 */
function getCurrentLanguage(): string
{
    static $currentLanguage = null;
    if ($currentLanguage === null) {
        $currentLanguage = apply_filters('wpml_current_language', null) ?? 'en';
    }

    return $currentLanguage;
}

/**
 * Get the value of a key from the "old" session data.
 *
 * @param string|null $key The key to retrieve.
 * @param mixed $default The default value to return if the key doesn't exist.
 * @return mixed The value of the key or the default value if it doesn't exist.
 */
function old(?string $key = null, mixed $default = null): mixed
{
    if (empty($key)) {
        return $_SESSION['old'] ?? [];
    }

    return $_SESSION['old'][$key] ?? $default;
}

function flash(string $key, mixed $value): void
{
    $_SESSION[$key] = $value;
    $_SESSION['counts'][$key] = 1;
}

function GDPR(): GDPR
{
    return GDPR::getInstance();
}
