<?php
/**
 * Plugin Name:       product-category
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       product-category
 *
 * @package ThriveBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Registers the block using a `blocks-manifest.php` file, which improves the performance of block type registration.
 * Behind the scenes, it also registers all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
 */
function thrive_blocks_product_category_block_init() {
	register_block_type( __DIR__ . '/build/product-category' , array( 'render_callback' => 'fwd_render_product_category' ));
}
add_action( 'init', 'thrive_blocks_product_category_block_init' );

function fwd_render_product_category( $attributes ) {
	ob_start();

	$terms = get_terms(array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => true,
	));

	if (!empty($terms) && !is_wp_error($terms)) {
		echo '<section class="thrive-product-category-section">';
		echo '<h2>See Our Menu</h2>';
		echo '<ul class="thrive-category-list">';
		foreach ($terms as $term) {
			if($term->slug === 'combo' || $term->slug === 'gift-cards' || $term->slug === 'cold' || $term->slug === 'hot') {
				continue; 
			}
			$image_id = get_term_meta($term->term_id, 'thumbnail_id', true);
			$image_url = wp_get_attachment_url($image_id);
			$link = get_term_link($term);
			
			echo '<li class="thrive-category-item">';
			echo '<a href="' . esc_url($link) . '">';
			echo '<img class="thrive-category-image"  src="'  . esc_url($image_url) . '"alt="' . esc_attr($term->name) . '">';
			echo '<h3 class="thrive-category-name">' . esc_html($term->name) . '</h3>';
			echo '</a>';
			echo '</li>';
		}
		echo '</ul>';
		echo '</section>';
	} else {
		echo '<p>No categories found.</p>';
	}

	return ob_get_clean();
}