<?php

/**
 * Modify excerpt length
 */
function flo_starter_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'flo_starter_excerpt_length', 999 );

/**
 * Modify excerpt 'Read more' text
 */
function flo_starter_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'flo_starter_excerpt_more' );

/**
 * Remove emoji polyfill
 */
function flo_starter_disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'flo_starter_disable_emojis' );
