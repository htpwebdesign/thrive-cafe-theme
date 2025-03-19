<?php

//registering hte custom post types
function thrive_register_custom_post_types(){
    //registering the location post type



    //registering the job postings post type



    //registering the founders post type

    $labels = array(
        'name' => _x('thrive-founders', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('thrive-founder', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => _x('thrive-founders', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('thrive-founder', 'Add New on Toolbar', 'textdomain'),
        'archives' => __('thrive-founder Archives', 'textdomain'),
        'attributes' => __('thrive-founder Attributes', 'textdomain'),
        'parent_item_colon' => __('Parent thrive-founder:', 'textdomain'),
        'all_items' => __('All thrive-founders', 'textdomain'),
        'add_new_item' => __('Add New thrive-founder', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'new_item' => __('New thrive-founder', 'textdomain'),
        'edit_item' => __('Edit thrive-founder', 'textdomain'),
        'update_item' => __('Update thrive-founder', 'textdomain'),
        'view_item' => __('View thrive-founder', 'textdomain'),
        'view_items' => __('View thrive-founders', 'textdomain'),
        'search_items' => __('Search thrive-founder', 'textdomain'),
        'not_found' => __('Not found', 'textdomain'),
        'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
        'featured_image' => __('Featured Image', 'textdomain'),
        'set_featured_image' => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image' => __('Use as featured image', 'textdomain'),
        'insert_into_item' => __('Insert into thrive-founder', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this thrive-founder', 'textdomain'),
        'items_list' => __('thrive-founders list', 'textdomain'),
        'items_list_navigation' => __('thrive-founders list navigation', 'textdomain'),
        'filter_items_list' => __('Filter thrive-founders list', 'textdomain'),
    );
    $args = array(
        'label' => __('thrive-founder', 'textdomain'),
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


}
add_action( 'init', 'thrive_register_custom_taxonomies', 0 );