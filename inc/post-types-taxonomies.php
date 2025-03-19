<?php

//registering hte custom post types
function thrive_register_custom_post_types(){
    //registering the location post type



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


}
add_action( 'init', 'thrive_register_custom_taxonomies', 0 );