<?php
/**
 * Custom hooks
 *
 * @package WP-rock/custom-hooks
 */

/**
 * Remove windows LSEP from content
 *
 * @param { string } $html - Text content.
 * @return array|string|string[]
 */
function remove_lsep( $html ): array|string {
    $pattern = '/\x{2028}/u';
    return preg_replace( $pattern, '', $html );
}



/**
 * Registers translation strings for Polylang.
 *
 * This function adds specific text strings to Polylang's string translation system,
 * allowing them to be translated via the WordPress admin panel.
 *
 * @return void
 */
function register_polylang_strings() {
    /**
     * Registers a string for translation in Polylang.
     *
     * @param string $name       The unique identifier for the string.
     * @param string $string     The actual text to be translated.
     * @param string $group      The group name for better organization in the admin panel.
     * @param bool   $multiline  Whether the string supports multiline input (true/false).
     */
    pll_register_string('read_more', 'Read More', 'Theme Strings', false);
}

/**
 * Hooks the `register_polylang_strings` function into WordPress initialization.
 * Ensures that translation strings are registered early in the request lifecycle.
 */
add_action('init', 'register_polylang_strings');


