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