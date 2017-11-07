<?php

/**
 * Setup theme defaults and add support for WordPress features
 */
function theme_name_theme_setup() {

	// Theme supports
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Register menus
	register_nav_menu( 'primary', esc_html__( 'Primary', 'theme_name' ) );

	// Load text domain
	load_theme_textdomain( 'theme_name', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'theme_name_theme_setup' );

/**
 * Enqueue theme scripts and styles.
 */
function theme_name_scripts_styles() {
	wp_enqueue_script( 'theme_name-bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array( 'jquery' ), true, true );
	wp_enqueue_script( 'theme_name-mainjs',  get_template_directory_uri() . '/js/jquery.main.js', array( 'jquery' ), true, true );

	wp_enqueue_style( 'theme_name-bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'theme_name-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts_styles' );

/**
 * Requires
 */
require get_theme_file_path( '/inc/wp-settings.php' );
require get_theme_file_path( '/inc/template-tags.php' );
require get_theme_file_path( '/inc/plugin-settings.php' );
require get_theme_file_path( '/inc/menus.php' );
// require get_theme_file_path( '/inc/nav-walker.php' );
// require get_theme_file_path( '/inc/acf-settings.php' );
// require get_theme_file_path( '/inc/block-login-page.php' );