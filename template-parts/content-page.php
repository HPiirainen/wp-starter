<?php
/**
 * Template part for displaying page content in search results etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php the_title( '<h1>', '</h1>' ); ?>
	<?php the_content(); ?>
	
</div>
