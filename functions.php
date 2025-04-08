<?php


function thrive_enqueues(){
	wp_enqueue_style(
		'thrive-style',
		get_theme_file_uri( 'style.css' ),
		array(),
		'12.0.0');
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
	wp_enqueue_style(
		'single job styles',
		get_theme_file_uri('assets/css/individual-job.css'),
		array(),
		'12.1.7'
    );
	wp_enqueue_style(
		'header-styles',
		get_theme_file_uri('assets/css/header.css'),
		array(),
		'12.1.15'
	);
	wp_enqueue_style(
		'location-styles',
		get_theme_file_uri('assets/css/archive-thrive-locations.css'),
		array(),
		'12.1.18'
	);
	wp_enqueue_style(
		'user account page styles',
		get_theme_file_uri('assets/css/user-account.css'),
		array(),
		'12.1.9'
	);
	wp_enqueue_style(
		'individual product styles',
		get_theme_file_uri('assets/css/individual-product.css'),
		array(),
		'12.1.10'
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

require get_template_directory() . '/product-category/product-category.php';

//removing the posts port type from the admin bar so that the clients cannot acces it
function remove_default_post_type() {
	remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_default_post_type');

function remove_admin_bar_post_links($wp_admin_bar) {
	$wp_admin_bar->remove_node('new-post');
}
add_action('admin_bar_menu', 'remove_admin_bar_post_links', 999);
function block_post_type_access() {
	if (is_singular('post') || is_post_type_archive('post')) {
		wp_redirect(home_url(), 301);
		exit;
	}
}
add_action('template_redirect', 'block_post_type_access');

//adding the company logo to the wordpress login page
function custom_thrive_login_page() {
    ?>
    <style type="text/css">
        body.login {
            background-color: #515151;
        }
		body.login p#nav a{
			color: #fff;
		}
		body.login p#backtoblog a{
			color: #fff;
		}
		body.login .privacy-policy-page-link a{
			color: #fff;
		}

        body.login div#login h1 a {
            background-image: url(http://localhost/thrive_cafe/wp-content/uploads/2025/03/cropped-Thrive.png); /* Replace with your Media URL */
            background-size: contain;
            background-repeat: no-repeat;
            width: 100%;
            height: 80px;
        }
        .custom-login-message {
            background: #fff;
            border-left: 5px solid #2771b1; /* Thrive Cafe tone */
            padding: 15px 20px;
            margin-top: 20px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
            font-size: 14px;
            line-height: 1.6;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'custom_thrive_login_page');

function custom_thrive_login_message() {
    return '<div class="custom-login-message">
        <strong>Welcome to Thrive Cafe website’s backend.</strong><br>
        If you are not the developer, store owner, or manager, you should not be here.
    </div>';
}
add_filter('login_message', 'custom_thrive_login_message');

