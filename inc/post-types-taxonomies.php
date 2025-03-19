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
    $capabilities = array(
		'manage_terms'               => 'do_not_allow',
		'edit_terms'               => 'do_not_allow',
		'delete_terms'               => 'do_not_allow',
		'assign_terms'               => 'edit_posts',
	);
	register_taxonomy( 'thrive-location', array( 'thrive-jobs' ), $args );

}
add_action( 'init', 'thrive_register_custom_taxonomies', 0 );