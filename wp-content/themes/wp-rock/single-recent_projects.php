<?php
/**
 * General template for single recent_project post.
 *
 * @package WP-rock
 * @since 4.4.0
 */

global $global_options;

$pictures_col_1 = get_field_value( $global_options, 'pictures_col_1' );
$pictures_col_2 = get_field_value( $global_options, 'pictures_col_2' );
$pictures_col_3 = get_field_value( $global_options, 'pictures_col_3' );
$pictures_col_4 = get_field_value( $global_options, 'pictures_col_4' );
$pictures_col_5 = get_field_value( $global_options, 'pictures_col_5' );
$pictures_col_6 = get_field_value( $global_options, 'pictures_col_6' );

get_header();

do_action( 'wp_rock_before_page_content' );

if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                $post_ID = get_the_ID();
                $project_content = get_post_meta($post_ID, 'project_content', true);
                $tech_stack_info = get_post_meta($post_ID, 'tech_stack_info', true);
                $live_preview_link = get_post_meta($post_ID, 'live_preview_link', true);
                $view_code_link = get_post_meta($post_ID, 'view_code_link', true);
                ?>
                <section class="hero-ver-2">
                    <div class="hero-ver-2__inner">
                        <div class="container hero-ver-2__container container-inner">
                            <div class="hero-ver-2__animate-bg-images">
                                <?php
                                if ( $pictures_col_1 ) {
                                    ?>
                                    <div class="hero-ver-2__animate-img-col-1 hero-ver-2__animate-img-col js-hero-ver-2-group-1">
                                        <?php foreach ( $pictures_col_1 as $item_img ) { ?>
                                            <figure class="hero-ver-2__animate-img-item">
                                                <img class="hero-ver-2__animate-img" src="<?php echo esc_html( $item_img ); ?>" width="276" height="471" alt="Gallery image">
                                            </figure>
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                                if ( $pictures_col_2 ) {
                                    ?>
                                    <div class="hero-ver-2__animate-img-col-2 hero-ver-2__animate-img-col js-hero-ver-2-group-2">
                                        <?php foreach ( $pictures_col_2 as $item_img ) { ?>
                                            <figure class="hero-ver-2__animate-img-item">
                                                <img class="hero-ver-2__animate-img" src="<?php echo esc_html( $item_img ); ?>" width="276" height="471" alt="Gallery image">
                                            </figure>
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                                if ( $pictures_col_3 ) {
                                    ?>
                                    <div class="hero-ver-2__animate-img-col-3 hero-ver-2__animate-img-col js-hero-ver-2-group-1">
                                        <?php foreach ( $pictures_col_3 as $item_img ) { ?>
                                            <figure class="hero-ver-2__animate-img-item">
                                                <img class="hero-ver-2__animate-img" src="<?php echo esc_html( $item_img ); ?>" width="276" height="471" alt="Gallery image">
                                            </figure>
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                                if ( $pictures_col_4 ) {
                                    ?>
                                    <div class="hero-ver-2__animate-img-col-4 hero-ver-2__animate-img-col js-hero-ver-2-group-3">
                                        <?php foreach ( $pictures_col_4 as $item_img ) { ?>
                                            <figure class="hero-ver-2__animate-img-item">
                                                <img class="hero-ver-2__animate-img" src="<?php echo esc_html( $item_img ); ?>" width="276" height="471" alt="Gallery image">
                                            </figure>
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                                if ( $pictures_col_5 ) {
                                    ?>
                                    <div class="hero-ver-2__animate-img-col-5 hero-ver-2__animate-img-col js-hero-ver-2-group-2">
                                        <?php foreach ( $pictures_col_5 as $item_img ) { ?>
                                            <figure class="hero-ver-2__animate-img-item">
                                                <img class="hero-ver-2__animate-img" src="<?php echo esc_html( $item_img ); ?>" width="276" height="471" alt="Gallery image">
                                            </figure>
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                                if ( $pictures_col_6 ) {
                                    ?>
                                    <div class="hero-ver-2__animate-img-col-6 hero-ver-2__animate-img-col js-hero-ver-2-group-3">
                                        <?php foreach ( $pictures_col_6 as $item_img ) { ?>
                                            <figure class="hero-ver-2__animate-img-item">
                                                <img class="hero-ver-2__animate-img" src="<?php echo esc_html( $item_img ); ?>" width="276" height="471" alt="Gallery image">
                                            </figure>
                                        <?php } ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="hero-ver-2__content">
                                <?php
                                $post_title = get_the_title();
                                echo ( $post_title )
                                    ? '<h1 class="hero-ver-2__title">' . do_shortcode( $post_title ) . '</h1>'
                                    : '';

//                                echo ( $desc )
//                                    ? '<div class="hero-ver-2__desc">' . do_shortcode( $desc ) . '</div>'
//                                    : '';
                                ?>
                            </div>
                        </div>
                    </div>
                </section>



<!--                <div class="project__title">--><?php //the_title(); ?><!--</div>-->
<!--                --><?php
//                echo ($project_content)
//                    ? '<div class="project__content">' . do_shortcode($project_content) . '</div>'
//                    : '';
//
//                echo ($tech_stack_info)
//                    ? '<div class="project__tech-stack">' . do_shortcode($tech_stack_info) . '</div>'
//                    : '';
//
//                if($live_preview_link) : ?>
<!--                    <div class="project__item-bottom">-->
<!--                        --><?php
//                        echo ($live_preview_link)
//                            ? '<a href="' . do_shortcode($live_preview_link["url"]) . '" class="project__live-preview-link">' . do_shortcode($live_preview_link["title"]) . '</a>'
//                            : '';
//
//                        echo ($view_code_link)
//                            ? '<a href="' . do_shortcode($view_code_link["url"]) . '" class="project__view-code-link">' . do_shortcode($view_code_link["title"]) . '</a>'
//                            : '';
//                        ?>
<!--                    </div>-->
<!--                --><?php //endif;
            endwhile;
        endif;

do_action( 'wp_rock_after_page_content' ); ?>
<?php
get_footer();
