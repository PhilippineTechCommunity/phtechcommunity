<?php
/**
 * Functions for the tech community theme.
 *
 * @package phcommunity.tech
 */

/**
 * Theme asset loading.
 */
function techleadstheme_enqueue_styles() {
	$parent_style = 'cactus-style';

	wp_enqueue_style( 'techleadstheme-style',
		get_stylesheet_directory_uri() . '/assets/css/themestyle.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'techleadstheme_enqueue_styles' );
