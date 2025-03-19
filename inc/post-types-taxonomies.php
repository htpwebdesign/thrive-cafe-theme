<?php

//registering hte custom post types
function thrive_register_custom_post_types(){
    //registering the location post type
	$labels = array(
		'name'                  => _x( 'thrive-locations', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'thrive-location', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Locations', 'text_domain' ),
		'name_admin_bar'        => __( 'Locations', 'text_domain' ),
		'archives'              => __( 'Location Archives', 'text_domain' ),
		'attributes'            => __( 'Location Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Locations:', 'text_domain' ),
		'all_items'             => __( 'All Locations', 'text_domain' ),
		'add_new_item'          => __( 'Add New Location', 'text_domain' ),
		'add_new'               => __( 'Add Location', 'text_domain' ),
		'new_item'              => __( 'New Location', 'text_domain' ),
		'edit_item'             => __( 'Edit Location', 'text_domain' ),
		'update_item'           => __( 'Update Location', 'text_domain' ),
		'view_item'             => __( 'View Location', 'text_domain' ),
		'view_items'            => __( 'View Location', 'text_domain' ),
		'search_items'          => __( 'Search Location', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Location', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Location', 'text_domain' ),
		'items_list'            => __( 'Location list', 'text_domain' ),
		'items_list_navigation' => __( 'Location list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items Location', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'thrive-location', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'thrive-locations', $args );

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

    $labels = array(
        'name' => _x('founders', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('founder', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => _x('Founders', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('founders', 'Add New on Toolbar', 'textdomain'),
        'archives' => __('founders Archives', 'textdomain'),
        'attributes' => __('founders Attributes', 'textdomain'),
        'parent_item_colon' => __('Parent founders:', 'textdomain'),
        'all_items' => __('All founders', 'textdomain'),
        'add_new_item' => __('Add New founders', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'new_item' => __('New founders', 'textdomain'),
        'edit_item' => __('Edit founders', 'textdomain'),
        'update_item' => __('Update founders', 'textdomain'),
        'view_item' => __('View founders', 'textdomain'),
        'view_items' => __('View founders', 'textdomain'),
        'search_items' => __('Search founders', 'textdomain'),
        'not_found' => __('Not found', 'textdomain'),
        'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
        'featured_image' => __('Featured Image', 'textdomain'),
        'set_featured_image' => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image' => __('Use as featured image', 'textdomain'),
        'insert_into_item' => __('Insert into founders', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this founders', 'textdomain'),
        'items_list' => __('founders list', 'textdomain'),
        'items_list_navigation' => __('founders list navigation', 'textdomain'),
        'filter_items_list' => __('Filter founders list', 'textdomain'),
    );
    $args = array(
        'label' => __('founders', 'textdomain'),
        'description' => __('', 'textdomain'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'thumbnail'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'rewrite' => array(
                'slug' => 'founders',
        ),
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type('thrive-founders', $args);

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
	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Locations', 'text_domain' ),
		'all_items'                  => __( 'All Locations', 'text_domain' ),
		'parent_item'                => __( 'Parent Location', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Location:', 'text_domain' ),
		'new_item_name'              => __( 'New Location Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Location', 'text_domain' ),
		'edit_item'                  => __( 'Edit Location', 'text_domain' ),
		'update_item'                => __( 'Update Location', 'text_domain' ),
		'view_item'                  => __( 'View Location', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Location with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Location', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Locations', 'text_domain' ),
		'search_items'               => __( 'Search Locations', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Locations', 'text_domain' ),
		'items_list'                 => __( 'Locations list', 'text_domain' ),
		'items_list_navigation'      => __( 'Locations list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'thrive-location', array( 'thrive-jobs' ), $args );

}
add_action( 'init', 'thrive_register_custom_taxonomies', 0 );


function auto_create_location_taxonomy_term($post_id, $post, $update) {
    if ($post->post_type !== 'thrive-locations') {
        return;
    }

    $location = $post->post_title;

    if (!term_exists($location, 'thrive-location')) {
        wp_insert_term($location, 'thrive-location');
    }
}
add_action('save_post', 'auto_create_location_taxonomy_term', 10, 3);
