<?php

/**
 * Setup theme defaults and add support for WordPress features
 */
function flo_starter_after_setup_theme() {

	// Theme supports
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		[
			'navigation-widgets',
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		]
	);

	// Gutenberg
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-color-palette' );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'editor-font-sizes', [] );
	add_theme_support( 'disable-custom-font-sizes' );
	add_theme_support( 'disable-custom-gradients' );
	add_theme_support( 'editor-gradient-presets', [] );

	// Set max content width
	if ( ! isset( $content_width ) ) {
		$content_width = 800;
	}

	// Register menus
	register_nav_menus(
		[
			'primary' => esc_html__( 'Primary' ),
		]
	);

	// Change default WordPress image sizes
	$default_image_sizes = [
		[
			'name'   => 'thumbnail',
			'width'  => 100,
			'height' => 100,
		],
	];
	/*
	foreach ( $image_sizes as $size ) {
		if ( intval( get_option( $size['name'] . '_size_w' ) ) !== $size['width'] ) {
			update_option( $size['name'] . '_size_w', $size['width'] );
			update_option( $size['name'] . '_size_h', $size['height'] );
		}
	}
	*/

	// Add custom image sizes
	//add_image_size( 'carousel', 1300, 434, true );
}
add_action( 'after_setup_theme', 'flo_starter_after_setup_theme' );

/**
 * Register custom image sizes in image size chooser
 */
function flo_starter_image_size_names_choose( $sizes ) {
	return array_merge(
		$sizes,
		[
			'custom-size' => __( 'Custom size' ),
		]
	);
}
// add_filter( 'image_size_names_choose', 'flo_starter_image_size_names_choose' );
