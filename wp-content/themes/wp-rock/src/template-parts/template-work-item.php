<?php
/**
 * Template "Work item".
 *
 * @package WordPress
 */

$post_id           = get_field_value($args, 'post_id');
$tech_stack_info   = get_field_value($args, 'tech_stack_info');
$live_preview_link = get_field_value($args, 'live_preview_link');
$view_code_link    = get_field_value($args, 'view_code_link');

?>

<div class="works__item" data-postID="<?php echo do_shortcode($post_ID); ?>">
    <a class="works__item-link" href="<?php echo get_permalink(); ?>"></a>
    <figure class="works__figure">
        <?php the_post_thumbnail('full'); ?>
    </figure>
    <div class="works__item-content">
        <div class="works__item-title"><?php the_title(); ?></div>
        <?php
        echo (has_excerpt())
            ? '<p class="works__excerpt">' . do_shortcode(get_the_excerpt()) . '</p>'
            : '';

        echo ($tech_stack_info)
            ? '<p class="works__tech-stack">' . do_shortcode($tech_stack_info) . '</p>'
            : '';
        ?>
        <div class="works__item-bottom">
            <?php
            echo ($live_preview_link)
                ? '<a href="' . do_shortcode($live_preview_link["url"]) . '" class="works__live-preview-link works__link">' . do_shortcode($live_preview_link["title"]) . '</a>'
                : '';

            echo ($view_code_link)
                ? '<a href="' . do_shortcode($view_code_link["url"]) . '" class="works__view-code-link works__link">' . do_shortcode($view_code_link["title"]) . '</a>'
                : '';
            ?>
        </div>
    </div>
</div>



