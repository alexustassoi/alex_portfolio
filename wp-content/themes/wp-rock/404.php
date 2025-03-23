<?php
/**
 * General template for 404 page
 *
 * @package WP-rock
 * @since 4.4.0
 */

get_header();

global $global_options;
$img_404      = get_field_value($global_options, '404_img');
$text_404     = get_field_value($global_options, '404_text');
$back_home_btn = get_field_value($global_options, '404_btn_text');

do_action('wp_rock_before_page_content');

?>

<section class="section-404">
    <div class="section-404__content">
        <?php
        echo ($img_404)
            ? '<figure class="section-404__main-img-wrap"><img class="section-404__main-img" width="790" height="392" src="' . do_shortcode($img_404) . '" alt="404"></figure>'
            : '';

        echo ($text_404)
            ? '<p class="section-404__text">' . do_shortcode($text_404) . '</p>'
            : '';

        echo ($back_home_btn)
            ? '<a href="' . get_home_url() . '" class="section-404__back-home-btn">' . do_shortcode($back_home_btn) . '</a>'
            : '';
        ?>
    </div>
</section>
<?php do_action('wp_rock_after_page_content'); ?>
<?php wp_footer(); ?>
