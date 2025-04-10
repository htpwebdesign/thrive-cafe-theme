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
        if(is_shop()){
		wp_enqueue_script(
			'thrive-scroll-to-top',
			get_theme_file_uri( 'assets/js/scroll-to-top.js'),
			array(),
			wp_get_theme()->get( 'Version' ),
			array('strategy' => 'defer')
		);}
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

//removing the comments from the admin bar so that the clients cannot acces it
// Remove Comments from admin menu
function remove_comments_from_admin() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comments_from_admin');

// Remove Comments from admin bar
function remove_comments_from_admin_bar($wp_admin_bar) {
	$wp_admin_bar->remove_node('comments');
}
add_action('admin_bar_menu', 'remove_comments_from_admin_bar', 999);

// Redirect any direct access to comments section
function block_comment_pages() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url(), 301);
		exit;
	}
}
add_action('admin_init', 'block_comment_pages');

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
            background-image: url(https://thrivecafe.bcitwebdeveloper.ca/wp-content/uploads/2025/03/cropped-Thrive.png); /* Replace with your Media URL */
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

