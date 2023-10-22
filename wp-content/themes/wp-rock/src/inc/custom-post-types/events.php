<?php
/**
 * Custom post type events
 *
 * @package WP-rock
 * @since 4.4.0
 */

/*

/**
 * Registers a new post type
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 *
 * @return object|WP_Error the registered post type object, or an error object
 * @uses $wp_post_types Inserts new post type object into the list
 *
 */
function recent_projects_register_name() {

    $labels = array(
        'name'               => __( 'Projects', 'wp-rock' ),
        'singular_name'      => __( 'Project', 'wp-rock' ),
        'add_new'            => _x( 'Add New Project', 'wp-rock', 'wp-rock' ),
        'add_new_item'       => __( 'Add New Project', 'wp-rock' ),
        'edit_item'          => __( 'Edit Project', 'wp-rock' ),
        'new_item'           => __( 'New Project', 'wp-rock' ),
        'view_item'          => __( 'View Project', 'wp-rock' ),
        'search_items'       => __( 'Search Project', 'wp-rock' ),
        'not_found'          => __( 'No Project found', 'wp-rock' ),
        'not_found_in_trash' => __( 'No Projects found in Trash', 'wp-rock' ),
        'parent_item_colon'  => __( 'Parent Project:', 'wp-rock' ),
        'menu_name'          => __( 'Recent Projects', 'wp-rock' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => true,
        'description'         => 'description',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_icon'           => 'dashicons-admin-post',
        'menu_position'       => null,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => true,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
        'supports'            => array(
            'title',
            'editor',
            'custom-fields',
            'page-attributes',
            'thumbnail',
            'excerpt'
        ),
    );

    register_post_type( 'recent_projects', $args );
}
add_action( 'init', 'recent_projects_register_name' );
