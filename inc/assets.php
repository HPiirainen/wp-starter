<?php

/**
 * Return font URL
 */
function flo_starter_get_font_url() {
	$protocol = is_ssl() ? 'https' : 'http';
	$font_url = "$protocol://fonts.googleapis.com/css?family=Open+Sans:300,400,500,700";
	return $font_url;
}

/**
 * Enqueue theme scripts and styles.
 */
function flo_starter_enqueue_scripts() {
	$main_js_file_name = 'jquery.main';
	$main_css_file_name = 'main';
	$bootstrap_version = '4.5.0';

	wp_enqueue_script( 'flo_starter-bootstrap-js', "//stackpath.bootstrapcdn.com/bootstrap/{$bootstrap_version}/js/bootstrap.bundle.min.js", [ 'jquery' ], $bootstrap_version, true );
	wp_enqueue_script( 'flo_starter-mainjs', get_theme_file_uri( "js/{$main_js_file_name}.js" ), [ 'jquery' ], filemtime( get_theme_file_path( "js/{$main_js_file_name}.js" ) ), true );

	wp_enqueue_style( 'flo_starter-fonts', esc_url_raw( flo_starter_get_font_url() ), [], '1' );
	wp_enqueue_style( 'flo_starter-bootstrap-css', get_theme_file_uri( 'css/bootstrap.css' ), [], filemtime( get_theme_file_path( 'css/bootstrap.css' ) ) );
	wp_enqueue_style( 'flo_starter-style', get_theme_file_uri( "css/{$main_css_file_name}.css" ), [ 'flo_starter-bootstrap-css' ], filemtime( get_theme_file_path( "css/{$main_css_file_name}.css" ) ) );
}
add_action( 'wp_enqueue_scripts', 'flo_starter_enqueue_scripts' );

/**
 * Enqueue Gutenberg assets
 */
function flo_starter_block_editor_assets() {
	// Google font
	wp_enqueue_style( 'flo_starter-gutenberg-fonts', esc_url_raw( flo_starter_get_font_url() ), [], '1' );

	// Editor styles
	wp_enqueue_style( 'flo_starter-gutenberg-styles', get_theme_file_uri( 'css/editor-gutenberg.css' ), [], filemtime( get_theme_file_path( 'css/editor-gutenberg.css' ) ) );

	// Editor script
	wp_enqueue_script( 'flo_starter-gutenberg-script', get_theme_file_uri( 'js/editor-gutenberg.js' ), [ 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ], filemtime( get_theme_file_path( 'js/editor-gutenberg.js' ) ), true );
}
add_action( 'enqueue_block_editor_assets', 'flo_starter_block_editor_assets' );
