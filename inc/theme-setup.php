<?php

/**
 * Setup theme defaults and add support for WordPress features
 */
function flo_starter_after_setup_theme() {

	// Theme supports
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'script',
		'style'
	] );

	// Gutenberg
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-color-palette' );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'editor-font-sizes', [] );
	add_theme_support( 'disable-custom-font-sizes' );

	// Register menus
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary' ),
		)
	);

	// Add custom image sizes
	//add_image_size( 'carousel', 1300, 434, true );
}
add_action( 'after_setup_theme', 'flo_starter_after_setup_theme' );
