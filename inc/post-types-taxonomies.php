<?php

//registering hte custom post types
function thrive_register_custom_post_types(){
    //registering the location post type



    //registering the job postings post type



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


}
add_action( 'init', 'thrive_register_custom_taxonomies', 0 );