<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php the_title( '<h1>', '</h1>' ); ?>

	<?php the_content(); ?>

<?php endwhile; ?>

<?php get_footer();