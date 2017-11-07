<?php
/**
 * Template part for displaying content in search results
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>

	<?php if ( get_post_type() === 'post' ) : ?>

		<strong><?php flo_starter_get_single_post_datetime(); ?></strong>

	<?php endif; ?>

	<?php the_excerpt(); ?>

</div>
