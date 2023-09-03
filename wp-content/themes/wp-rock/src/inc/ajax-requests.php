<?php
/**
 * Different Ajax requests
 *
 * @package WP-rock/ajax_requests
 */

$wp_rock = new WP_Rock();

$wp_rock->ajax_front_to_backend( 'more_archive_posts', 'more_archive_posts' );
/**
 *  Get more archive posts
 */
function more_archive_posts() {
     $page     = filter_input( INPUT_POST, 'page', FILTER_SANITIZE_STRING );
    $cat_id    = filter_input( INPUT_POST, 'cat_id', FILTER_SANITIZE_STRING );
    $tax_id    = filter_input( INPUT_POST, 'tax_id', FILTER_SANITIZE_STRING );
    $terms_ids = array();

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'resources',
        'post_status' => 'publish',
        'posts_per_page' => get_option( 'posts_per_page' ),
        'posts_per_archive_page' => get_option( 'posts_per_page' ),
        'paged' => $page,
    );

    if ( $cat_id ) :
        if ( 'all' !== $cat_id ) :
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'resources-category',
                    'field' => 'id',
                    'terms' => $cat_id,
                ),
            );
        endif;

        if ( 'all' === $cat_id ) :
            $terms_arr = get_terms(
                'resources-category',
                array(
                    'hide_empty' => false,
                )
            );

            foreach ( $terms_arr as $r_terms ) :
                array_push( $terms_ids, $r_terms->term_id );
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

    if ( $tax_id ) :
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'resources-tags',
                'field' => 'id',
                'terms' => $tax_id,
            ),
        );
    endif;

    $loop = new WP_Query( $args );

    ob_start();
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) :
            $loop->the_post();
            echo esc_html( get_template_part( 'src/template-parts/template', 'small-posts' ) );
        endwhile;
    endif;
    $data = ob_get_clean();
    wp_reset_postdata();
    wp_send_json_success( $data );
}
