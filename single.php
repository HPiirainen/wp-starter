<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php flo_starter_the_yoast_breadcrumb(); ?>

	<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

<?php endwhile; ?>

<?php get_footer();