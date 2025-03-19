<?php


function thrive_enqueues(){
    wp_enqueue_style( 
		'thrive-normalize', 
		get_theme_file_uri( 'assets/css/normalize.css'), 
		array(), 
		'12.1.0'
	);
}
add_action( 'wp_enqueue_scripts', 'thrive_enqueues' );


//Adding custom post types and custom taxonomies
require get_template_directory() . '/inc/post-types-taxonomies.php';