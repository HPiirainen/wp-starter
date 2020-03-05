<?php

/**
 * Set allowed blocks in Gutenberg editor
 *
 * Blocks not listed here are disallowed
 */
function flo_starter_allowed_block_types( $allowed_block_types, $post ) {
	$blocks = [];

	/**
	 * Common blocks
	 */
	//  $blocks[] = 'core/audio';
	//  $blocks[] = 'core/cover';
	$blocks[] = 'core/file';
	$blocks[] = 'core/gallery';
	$blocks[] = 'core/heading';
	$blocks[] = 'core/image';
	$blocks[] = 'core/list';
	$blocks[] = 'core/paragraph';
	$blocks[] = 'core/quote';
	//  $blocks[] = 'core/video';

	/**
	 * Formatting
	 */
	//  $blocks[] = 'core/code';
	$blocks[] = 'core/freeform'; // classic editor
	$blocks[] = 'core/html';
	//  $blocks[] = 'core/preformatted';
	$blocks[] = 'core/pullquote';
	$blocks[] = 'core/table';
	//  $blocks[] = 'core/verse';

	/**
	 * Layout
	 */
	$blocks[] = 'core/button';
	$blocks[] = 'core/columns';
	$blocks[] = 'core/group';
	$blocks[] = 'core/media-text';
	//  $blocks[] = 'core/more';
	//  $blocks[] = 'core/nextpage';
	$blocks[] = 'core/separator';
	//  $blocks[] = 'core/spacer';

	/**
	 * Widgets
	 */
	//  $blocks[] = 'core/archives';
	//  $blocks[] = 'core/categories';
	//  $blocks[] = 'core/latest-comments';
	//  $blocks[] = 'core/latest-posts';
	$blocks[] = 'core/shortcode';

	/**
	 * Embeds
	 */
	$blocks[] = 'core/embed';
	$blocks[] = 'core-embed/twitter';
	$blocks[] = 'core-embed/youtube';
	$blocks[] = 'core-embed/facebook';
	$blocks[] = 'core-embed/instagram';
	$blocks[] = 'core-embed/soundcloud';
	$blocks[] = 'core-embed/spotify';
	$blocks[] = 'core-embed/flickr';
	$blocks[] = 'core-embed/vimeo';
	$blocks[] = 'core-embed/issuu';
	$blocks[] = 'core-embed/slideshare';
	// a lot of other services

	/**
	 * Reusable blocks
	 */
	$blocks[] = 'core/block';

	/**
	 * Plugins
	 */

	/**
	 * Custom
	 */

	return $blocks;
}
// add_filter( 'allowed_block_types', 'flo_starter_allowed_block_types', 10, 2 );
