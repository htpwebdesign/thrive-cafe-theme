<?php

//registering hte custom post types
function thrive_register_custom_post_types(){
    //registering the location post type



    //registering the job postings post type
	$labels = array(
		'name'                  => _x( 'jobs', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'job', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Jobs', 'text_domain' ),
		'name_admin_bar'        => __( 'Jobs', 'text_domain' ),
		'archives'              => __( 'Job Archives', 'text_domain' ),
		'attributes'            => __( 'Job Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Job:', 'text_domain' ),
		'all_items'             => __( 'All Jobs', 'text_domain' ),
		'add_new_item'          => __( 'Add New Job', 'text_domain' ),
		'add_new'               => __( 'Add Job', 'text_domain' ),
		'new_item'              => __( 'New Job', 'text_domain' ),
		'edit_item'             => __( 'Edit Job', 'text_domain' ),
		'update_item'           => __( 'Update Job', 'text_domain' ),
		'view_item'             => __( 'View Job', 'text_domain' ),
		'view_items'            => __( 'View Jobs', 'text_domain' ),
		'search_items'          => __( 'Search Job', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into job', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this job', 'text_domain' ),
		'items_list'            => __( 'jobs list', 'text_domain' ),
		'items_list_navigation' => __( 'jobs list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter jobs list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'careers',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'job', 'text_domain' ),
		'description'           => __( 'All Thrive Cafe Job Postings', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
        'taxonomies'            => array('thrive-location'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'thrive-jobs', $args );

    //registering the founders post type
}
add_action( 'init', 'thrive_register_custom_post_types', 0 );

function thrive_rewrite_flush() {
    thrive_register_custom_post_types();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'thrive_rewrite_flush' );


//registering the custom taxonomies
function thrive_register_custom_taxonomies() {
    //reigstering the location taxonomy


}
add_action( 'init', 'thrive_register_custom_taxonomies', 0 );


function auto_create_location_taxonomy_term($post_id, $post, $update) {
    if ($post->post_type !== 'thrive-locations') {
        return;
    }

    $location = $post->post_title;

    if (!term_exists($location, 'thrive-location')) {
        wp_insert_term($skill_name, 'thrive-location');
    }
}
add_action('save_post', 'auto_create_location_taxonomy_term', 10, 3);
