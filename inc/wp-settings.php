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
 * Limit revision counts
 */
function flo_starter_limit_revisions( $number, $post ) {
	return 10;
}
add_filter( 'wp_revisions_to_keep', 'flo_starter_limit_revisions', 10, 2 );

/**
 * Disable plugins auto-update UI elements.
 */
add_filter( 'plugins_auto_update_enabled', '__return_false' );
