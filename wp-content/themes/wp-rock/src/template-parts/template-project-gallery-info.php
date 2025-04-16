<?php
/**
 * Template: Project gallery info.
 *
 * @package WP-rock
 */

$custom_class      = get_field_value($args, 'custom_class');
$project_content   = get_field_value($args, 'project_content');
$tech_stack_info   = get_field_value($args, 'tech_stack_info');
$live_preview_link = get_field_value($args, 'live_preview_link');
$view_code_link    = get_field_value($args, 'view_code_link');

?>

<div class="project-gallery__info <?php echo $custom_class ? do_shortcode($custom_class) : ''; ?>">
    <div class="project-gallery__project-title">
        <?php echo the_title(); ?>
    </div>
    <div class="project-gallery__project-content">
        <div class="project-gallery__project-content-inner">
            <?php
            echo $project_content
                ? do_shortcode($project_content)
                : '';
            ?>
        </div>
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
