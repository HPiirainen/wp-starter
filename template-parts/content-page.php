<?php
/**
 * Template part for displaying page content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_singular() ) : ?>
		<?php the_title( '<h1>', '</h1>' ); ?>
		<?php the_content(); ?>
	<?php else : ?>
		<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
		<?php the_excerpt(); ?>
	<?php endif; ?>
</div>
