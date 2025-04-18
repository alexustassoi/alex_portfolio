<?php
/**
 * Block -  Recent project.
 *
 * @package WP-rock
 * @since   4.4.0
 */


$fields     = get_fields();
$hide_block = get_field_value($fields, 'hide_block');

if ($hide_block) return;
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
                'posts_per_page' => $max_posts_per_page,
                'post_status' => 'publish',
                'order' => 'ASC',
                'orderby' => 'title',
                'lang' => pll_current_language(),
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

                        $args = array(
                            'post_id' => $post_ID,
                            'tech_stack_info' => $tech_stack_info,
                            'live_preview_link' => $live_preview_link,
                            'view_code_link' => $view_code_link,
                        );

                        include(locate_template('src/template-parts/template-work-item.php', false, false, $args));
                        ?>
                    <?php endwhile; ?>
                </div>
                <?php
                if ($load_more_btn) : ?>
                    <div class="works__btn button"
                         data-role="load-more-projects"
                         data-load-step="<?php echo do_shortcode($max_posts_per_page); ?>"
                         data-posts-shown="<?php echo do_shortcode($max_posts_per_page); ?>">
                        <?php echo do_shortcode($load_more_btn); ?>
                    </div>
                <?php endif;

                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>
