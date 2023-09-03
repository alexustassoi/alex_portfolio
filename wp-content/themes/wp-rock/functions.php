<?php
/**
 * Main function themes
 *
 * @package WP-rock
 * @since 4.4.0
 */

// required files.
require get_template_directory() . '/src/inc/class-wp-rock.php';
require get_template_directory() . '/src/inc/initial-setup.php';
require get_template_directory() . '/src/inc/enqueue-scripts.php';
require get_template_directory() . '/src/inc/wpeditor-formats-options.php';
require get_template_directory() . '/src/inc/analytics-settings.php';
require get_template_directory() . '/src/inc/acf-setting.php';
require get_template_directory() . '/src/inc/custom-posts-type.php';
require get_template_directory() . '/src/inc/custom-taxonomies.php';
require get_template_directory() . '/src/inc/woocommerce-customization.php';
require get_template_directory() . '/src/inc/class-wp-rock-blocks.php';
require get_template_directory() . '/src/inc/ajax-requests.php';
require get_template_directory() . '/src/inc/custom-accept-cookies.php';
require get_template_directory() . '/src/inc/custom-hooks.php';

add_filter( 'show_admin_bar', '__return_false' );
