<?php
/**
 * Template: Custom sidebar.
 *
 * @package WP-rock
 */

global $global_options;

$logo            = get_field_value($global_options, 'logo');
$copyright       = get_field_value($global_options, 'copyright');
$social_repeater = get_field_value($global_options, 'social_repeater');
?>

<div id="custom-left-sidebar" class="custom-sidebar custom-sidebar__left">
    <?php
    echo ($logo)
        ? '<a class="custom-sidebar__logo" href="' . get_home_url() . '"><img src="' . do_shortcode($logo) . '" alt="Logo"></a>'
        : '';

    wp_nav_menu(
        array(
            'theme_location' => 'primary_menu',
            'container' => 'ul',
            'menu_class' => 'custom-sidebar__menu',
        )
    );

    if ($social_repeater) { ?>
        <div class="custom-sidebar__social-wrap">
            <?php foreach ($social_repeater as $item) {
                $icon = get_field_value($item, 'icon');
                $link = get_field_value($item, 'link');
                $image_id = attachment_url_to_postid( $icon );
                list($image_src, $image_width, $image_height) = wp_get_attachment_image_src( $image_id, 'default', true );

                echo '<a class="custom-sidebar__social-item" href="' . do_shortcode($link) . '"><img src="' . do_shortcode($icon) . '" alt="Social icon"></a>';
            } ?>
        </div>
    <?php }

    echo ($copyright)
        ? '<div class="custom-sidebar__copyright">' . do_shortcode($copyright) . '</div>'
        : '';
    ?>
</div>
