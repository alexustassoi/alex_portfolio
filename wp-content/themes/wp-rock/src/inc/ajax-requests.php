<?php
/**
 * Different Ajax requests
 *
 * @package WP-rock/ajax_requests
 */

$wp_rock = new WP_Rock();

$wp_rock->ajax_front_to_backend('more_archive_posts', 'more_archive_posts');
/**
 *  Get more archive posts
 */
function more_archive_posts()
{
    $page      = filter_input(INPUT_POST, 'page', FILTER_SANITIZE_STRING);
    $cat_id    = filter_input(INPUT_POST, 'cat_id', FILTER_SANITIZE_STRING);
    $tax_id    = filter_input(INPUT_POST, 'tax_id', FILTER_SANITIZE_STRING);
    $terms_ids = array();

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'resources',
        'post_status' => 'publish',
        'posts_per_page' => get_option('posts_per_page'),
        'posts_per_archive_page' => get_option('posts_per_page'),
        'paged' => $page,
    );

    if ($cat_id) :
        if ('all' !== $cat_id) :
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'resources-category',
                    'field' => 'id',
                    'terms' => $cat_id,
                ),
            );
        endif;

        if ('all' === $cat_id) :
            $terms_arr = get_terms(
                'resources-category',
                array(
                    'hide_empty' => false,
                )
            );

            foreach ($terms_arr as $r_terms) :
                array_push($terms_ids, $r_terms->term_id);
            endforeach;

            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'resources-category',
                    'field' => 'id',
                    'terms' => $terms_ids,
                ),
            );
        endif;
    endif;

    if ($tax_id) :
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'resources-tags',
                'field' => 'id',
                'terms' => $tax_id,
            ),
        );
    endif;

    $loop = new WP_Query($args);

    ob_start();
    if ($loop->have_posts()) :
        while ($loop->have_posts()) :
            $loop->the_post();
            echo esc_html(get_template_part('src/template-parts/template', 'small-posts'));
        endwhile;
    endif;
    $data = ob_get_clean();
    wp_reset_postdata();
    wp_send_json_success($data);
}


$wp_rock->ajax_front_to_backend('load-more-projects', 'load_more_project_posts');
/**
 *  Get more archive posts
 */
function load_more_project_posts()
{
    $postShown = filter_input(INPUT_POST, 'postShown', FILTER_SANITIZE_STRING);
    $loadStep  = filter_input(INPUT_POST, 'loadStep', FILTER_SANITIZE_STRING);

    $args = array(
        'post_type' => 'recent_projects',
        'posts_per_page' => $loadStep,
        'post_status' => 'publish',
        'offset' => $postShown,
        'order' => 'ASC',
    );

    $recent_projects_query = new WP_Query($args);
    $post_count            = $recent_projects_query->post_count;
    $post_total_count      = $recent_projects_query->found_posts;

    ob_start();
    if ($recent_projects_query->have_posts()) :
        while ($recent_projects_query->have_posts()) :
            $recent_projects_query->the_post();
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
        <?php endwhile;
    endif;
    $data = ob_get_clean();
    wp_reset_postdata();

    if ($post_count === (int)$loadStep && (int)$postShown + $post_count !== $post_total_count) {
        wp_send_json_success(array(
            'success' => true,
            'data' => $data
        ));
    } else {
        wp_send_json_error(
            array(
                'success' => false,
                'data' => $data
            )
        );
    }
}
