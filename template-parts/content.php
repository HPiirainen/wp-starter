<?php
/**
 * Template part for displaying post content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_single() ) : ?>

		<?php the_title( '<h1>', '</h1>' ); ?>

	<?php else : ?>

		<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

	<?php endif; ?>

	<strong><?php echo flo_starter_get_single_post_datetime(); ?></strong>

	<?php if ( is_single() ) : ?>

		<?php the_content(); ?>

	<?php else : ?>

		<?php the_excerpt(); ?>

	<?php endif; ?>

</div>
