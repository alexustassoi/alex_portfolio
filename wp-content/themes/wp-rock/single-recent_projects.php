<?php
/**
 * General template for single recent_project post.
 *
 * @package WP-rock
 * @since 4.4.0
 */

get_header();

do_action( 'wp_rock_before_page_content' );
?>
    <div class="single-blog container-inner project__container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                $post_ID = get_the_ID();
                $project_content = get_post_meta($post_ID, 'project_content', true);
                $tech_stack_info = get_post_meta($post_ID, 'tech_stack_info', true);
                $live_preview_link = get_post_meta($post_ID, 'live_preview_link', true);
                $view_code_link = get_post_meta($post_ID, 'view_code_link', true);
                ?>
                <div class="project__title"><?php the_title(); ?></div>
                <?php
                echo ($project_content)
                    ? '<div class="project__content">' . do_shortcode($project_content) . '</div>'
                    : '';

                echo ($tech_stack_info)
                    ? '<div class="project__tech-stack">' . do_shortcode($tech_stack_info) . '</div>'
                    : '';

                if($live_preview_link) : ?>
                    <div class="project__item-bottom">
                        <?php
                        echo ($live_preview_link)
                            ? '<a href="' . do_shortcode($live_preview_link["url"]) . '" class="project__live-preview-link">' . do_shortcode($live_preview_link["title"]) . '</a>'
                            : '';

                        echo ($view_code_link)
                            ? '<a href="' . do_shortcode($view_code_link["url"]) . '" class="project__view-code-link">' . do_shortcode($view_code_link["title"]) . '</a>'
                            : '';
                        ?>
                    </div>
                <?php endif;
            endwhile;
        endif;
        ?>
    </div>

<?php do_action( 'wp_rock_after_page_content' ); ?>
<?php
get_footer();
