<?php

/**
 * Setup theme defaults and add support for WordPress features
 */
function flo_starter_theme_setup() {

	// Theme supports
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Gutenberg
	add_theme_support( 'editor-color-palette', array( array() ) );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'editor-font-sizes', array( array() ) );
	add_theme_support( 'disable-custom-font-sizes' );

	// Use editor stylesheet
	add_theme_support( 'editor-styles' );
	add_editor_style(
		array(
			flo_starter_get_font_url(),
			'editor-style.css',
		)
	);

	// Register menus
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary' ),
		)
	);

	// Add custom image sizes
	//add_image_size( 'carousel', 1300, 434, true );
}
add_action( 'after_setup_theme', 'flo_starter_theme_setup' );

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
function flo_starter_scripts_styles() {
	$main_js_file_name = 'jquery.main';
	$main_css_file_name = 'main';

	wp_enqueue_script( 'flo_starter-bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array( 'jquery' ), true, true );
	wp_enqueue_script( 'flo_starter-mainjs',  get_theme_file_uri( "js/{$main_js_file_name}.js" ), array( 'jquery' ), filemtime( get_theme_file_path( "js/{$main_js_file_name}.js" ) ), true );

// 	wp_enqueue_style( 'flo_starter-fonts', esc_url_raw( flo_starter_get_font_url() ) );
	wp_enqueue_style( 'flo_starter-bootstrap-css', get_theme_file_uri( 'css/bootstrap.css' ) );
	wp_enqueue_style( 'flo_starter-style', get_theme_file_uri( "css/{$main_css_file_name}.css" ), array( 'flo_starter-bootstrap-css' ), filemtime( get_theme_file_path( "css/{$main_css_file_name}.css" ) ) );
}
add_action( 'wp_enqueue_scripts', 'flo_starter_scripts_styles' );