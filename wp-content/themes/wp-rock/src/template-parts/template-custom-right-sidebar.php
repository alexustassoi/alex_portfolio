<?php
/**
 * Template: Custom right sidebar.
 *
 * @package WP-rock
 */

global $global_options;

$social_repeater = get_field_value($global_options, 'social_repeater');
?>


<div id="custom-right-sidebar" class="custom-sidebar custom-sidebar__right">
    <?php
    if ($social_repeater) { ?>
        <div class="custom-sidebar__social-wrap">
            <?php foreach ($social_repeater as $item) {
                $icon = get_field_value($item, 'icon');
                $link = get_field_value($item, 'link');

                echo '<a class="custom-sidebar__social-item" href="' . do_shortcode($link) . '"><img src="' . do_shortcode($icon) . '" alt="Social"></a>';
            } ?>
        </div>
    <?php }
    ?>
</div>
