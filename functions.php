<?php


function thrive_enqueues(){
    wp_enqueue_style( 
		'thrive-normalize', 
		get_theme_file_uri( 'assets/css/normalize.css'), 
		array(), 
		'12.1.0'
	);
	wp_enqueue_style(
		'product_cards style',
		get_theme_file_uri('assets/css/product-card.css'),
		array(),
		'12.1.1'
	);
	wp_enqueue_style(
		'job-styles',
		get_theme_file_uri('blocks/job-details/job-details.css'),
		array(),
		'12.1.2'
	);
	wp_enqueue_style(
		'store-details-styles',
		get_theme_file_uri('blocks/store-details/store-details.css'),
		array(),
		'12.1.3'
	);
	wp_enqueue_style(
		'archive_products style',
		get_theme_file_uri('assets/css/archive-product.css'),
    array(),
    '12.1.5'
   );
    wp_enqueue_style(
		'front-apge-styles',
		get_theme_file_uri('assets/css/front-page.css'),
		array(),
		'12.1.4'
	);

	wp_enqueue_style(
		'careers archive styles',
		get_theme_file_uri('assets/css/archive-careers.css'),
		array(),
		'12.1.6'
	);
}
add_action( 'wp_enqueue_scripts', 'thrive_enqueues' );

function thrive_register_acf_blocks() {
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    register_block_type( __DIR__ . '/blocks/store-details' );
    register_block_type( __DIR__ . '/blocks/job-details' );
}
// Here we call our tt3child_register_acf_block() function on init.
add_action( 'init', 'thrive_register_acf_blocks' );

/**
 * Lower Yoast SEO Metabox location
 */
function yoast_to_bottom(){
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );

//Adding custom post types and custom taxonomies
require get_template_directory() . '/inc/post-types-taxonomies.php';