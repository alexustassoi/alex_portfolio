<?php
/**
 * Connecting scripts to site
 *
 * @package WP-rock
 */

/**
 * Get file last time update date for put as version in Enqueue scripts and styles
 *
 * @param {string} $file_path - file for analyze.
 *
 * @return string
 */
function get_file_modification_time( $file_path ) {
    return gmdate( 'ymd-Gis', filemtime( $file_path ) );
}

/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function px_site_scripts() {

    $general_style_ver = get_file_modification_time( get_stylesheet_directory() . '/style.css' );
    $custom_style_ver = get_file_modification_time( get_stylesheet_directory() . '/assets/public/css/frontend.css' );
    $custom_js_ver = get_file_modification_time( get_stylesheet_directory() . '/assets/public/js/frontend.js' );

    // Load our main stylesheet.
    wp_enqueue_style( 'wp-rock-style', get_stylesheet_uri(), $general_style_ver );

    wp_enqueue_style( 'wp-rock_style', get_template_directory_uri() . '/assets/public/css/frontend.css', array(), $custom_style_ver );

    wp_enqueue_style( 'swiper_css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), null );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'frontend_js', get_template_directory_uri() . '/assets/public/js/frontend.js', array( 'jquery' ), $custom_js_ver, true );

    global $global_options;

    $link_thanks = get_field_value( $global_options, 'link_thank_you_page' );

    $vars = array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'theme_path' => get_stylesheet_directory_uri(),
        'site_url' => get_site_url(),
        'thanks' => $link_thanks,
    );

    wp_localize_script( 'frontend_js', 'var_from_php', $vars );

    remove_action( 'wp_head', 'wp_print_scripts' );
    remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
    remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );

    add_action( 'wp_footer', 'wp_print_scripts', 5 );
    add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
    add_action( 'wp_footer', 'wp_print_head_scripts', 5 );

}

add_action( 'wp_enqueue_scripts', 'px_site_scripts' );


add_action(
    'admin_enqueue_scripts',
    function () {
        wp_enqueue_style( 'wp-rock_style_admin', get_template_directory_uri() . '/assets/public/css/backend.css', array(), '1.2.0' );

        wp_enqueue_script(
            'backend_js',
            get_template_directory_uri() . '/assets/public/js/backend.js',
            array(
                'jquery',
            ),
            '1.2.0',
            true
        );
    },
    99
);

