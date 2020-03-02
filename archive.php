<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<h1><?php post_type_archive_title(); ?></h1>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

	<?php endwhile; ?>
		
	<?php flo_starter_the_pagination(); ?>

<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

<?php get_footer();