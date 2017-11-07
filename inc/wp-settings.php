<?php

/**
 * Modify excerpt length
 */
function theme_name_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'theme_name_excerpt_length', 999 );

/**
 * Modify excerpt 'Read more' text
 */
function theme_name_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'theme_name_excerpt_more' );