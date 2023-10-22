<?php
/**
 * Block -  Recent project.
 *
 * @package WP-rock
 * @since   4.4.0
 */

$fields         = get_fields();
$title          = get_field_value($fields, 'title');
$pre_title_text = get_field_value($fields, 'pretitle_text');
$load_more_btn  = get_field_value($fields, 'load_more_btn');

$max_posts_per_page = get_option('posts_per_page')

?>

<section id="works" class="works">
    <div class="works__content-wrap container-inner">
        <div class="works__content">
            <?php
            echo ($pre_title_text)
                ? '<p class="works__pre-title pre-title">' . do_shortcode($pre_title_text) . '</p>'
                : '';

            echo ($title)
                ? '<h2 class="works__title section-title">' . do_shortcode($title) . '</h2>'
                : '';

            $args = array(
                'post_type' => 'recent_projects',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'order' => 'ASC',
            );

            $recent_project_query = new WP_Query($args);

            if ($recent_project_query->have_posts()) : ?>
                <div class="works__items js-works-items">
                    <?php while ($recent_project_query->have_posts()) :
                        $recent_project_query->the_post();
                        $post_ID           = get_the_ID();
                        $tech_stack_info   = get_post_meta($post_ID, 'tech_stack_info', true);
                        $live_preview_link = get_post_meta($post_ID, 'live_preview_link', true);
                        $view_code_link    = get_post_meta($post_ID, 'view_code_link', true);
                        ?>
                        <div class="works__item" data-postID="<?php echo do_shortcode($post_ID); ?>">
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

                                if ($live_preview_link) : ?>
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
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php
                echo ($load_more_btn)
                    ? '<div class="works__btn button" data-role="load-more-projects" data-load-step="' . do_shortcode($max_posts_per_page) . '" data-posts-shown="' . do_shortcode($max_posts_per_page) . '">' . do_shortcode($load_more_btn) . '</div>'
                    : '';

                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>
