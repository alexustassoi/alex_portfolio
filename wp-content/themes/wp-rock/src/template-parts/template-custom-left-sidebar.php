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

<div id="custom-left-sidebar" class="custom-sidebar custom-sidebar__left js-custom-sidebar-left">
    <div class="custom-sidebar__burger-menu-wrap" data-role="toggle-burger-menu">
        <div class="custom-sidebar__burger-menu js-burger-menu">
            <span class="burger__line burger__line-first"></span>
            <span class="burger__line burger__line-second"></span>
            <span class="burger__line burger__line-third"></span>
            <span class="burger__line burger__line-fourth"></span>
        </div>
    </div>
    <?php
    echo ($logo)
        ? '<a class="custom-sidebar__logo" href="' . get_home_url() . '"><img width="190" height="40" src="' . do_shortcode($logo) . '" alt="Logo"></a>'
        : '';

    if (!is_front_page()) {
        wp_nav_menu(
            array(
                'theme_location' => 'primary_menu_recent_project',
                'container' => 'ul',
                'menu_class' => 'custom-sidebar__menu',
            )
        );
    } else {
        wp_nav_menu(
            array(
                'theme_location' => 'primary_menu',
                'container' => 'ul',
                'menu_class' => 'custom-sidebar__menu',
            )
        );
    } ?>

    <!-- Language output start -->
    <div class="custom-sidebar__languages">
        <?php

        if (function_exists('pll_the_languages')) {
            echo '<ul class="custom-sidebar__languages-switcher">';
            pll_the_languages(
                array(
                    'show_flags' => 0,
                    'display_names_as' => 'slug'
                )
            );
            echo '</ul>';
        }
        ?>
    </div>
    <!-- Language output end -->

    <?php if ($social_repeater) { ?>
        <div class="custom-sidebar__social-wrap">
            <?php foreach ($social_repeater as $item) {
                $icon       = get_field_value($item, 'icon');
                $hover_icon = get_field_value($item, 'hover_icon');
                $link       = get_field_value($item, 'link');
                $image_id   = attachment_url_to_postid($icon);
                list($image_src, $image_width, $image_height) = wp_get_attachment_image_src($image_id, 'default', true);

                echo '<a class="custom-sidebar__social-item" href="' . do_shortcode($link) . '"><img class="custom-sidebar__social-icon" src="' . do_shortcode($icon) . '" alt="Social icon" /><img class="custom-sidebar__social-h-icon" src="' . do_shortcode($hover_icon) . '" alt="Social icon" /></a>';
            } ?>
        </div>
    <?php }

    echo ($copyright)
        ? '<div class="custom-sidebar__copyright">' . do_shortcode($copyright) . '</div>'
        : '';
    ?>
</div>
