<?php
/**
 * Template: Project gallery info.
 *
 * @package WP-rock
 */

$custom_class = get_field_value($args, 'custom_class'); ?>

<div class="project-gallery__info <?php echo $custom_class ? do_shortcode($custom_class) : ''; ?>">
    <div class="project-gallery__project-title">
        <?php echo the_title(); ?>
    </div>
    <div class="project-gallery__project-content">
        <p>The snow leopard's fur is whitish to grey with black spots on head and neck, with larger rosettes on the back, flanks and bushy tail. The belly is whitish. Its eyes are pale green or grey in color. Its muzzle is short and its forehead domed. Its nasal cavities are large. </p>
        <?php
        echo $tech_stack_info
            ? '<div class="project-gallery__tech-stack-info">' . do_shortcode($tech_stack_info) . '</div>'
            : '';
        ?>
        <div class="project-gallery__links">
            <?php
            echo ($live_preview_link)
                ? '<a href="' . do_shortcode($live_preview_link["url"]) . '" class="project-gallery__live-preview-link project-gallery__link">' . do_shortcode($live_preview_link["title"]) . '</a>'
                : '';

            echo ($view_code_link)
                ? '<a href="' . do_shortcode($view_code_link["url"]) . '" class="project-gallery__view-code-link project-gallery__link">' . do_shortcode($view_code_link["title"]) . '</a>'
                : '';
            ?>
        </div>
    </div>
</div>
