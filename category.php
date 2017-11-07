<?php
/**
 * The template for displaying category posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>
			
<?php if ( have_posts() ) : ?>

	<h1><?php single_cat_title(); ?></h1>
	
	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
		
	<?php endwhile; ?>
	
	<?php the_posts_pagination( array( 'mid_size'  => 3 ) ); ?>

<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'none' ); ?>
	
<?php endif; ?>

<?php get_footer(); ?>
