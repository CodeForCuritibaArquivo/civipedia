<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Flatter
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function flatter_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'flatter_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function flatter_jetpack_setup
add_action( 'after_setup_theme', 'flatter_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function flatter_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function flatter_infinite_scroll_render
