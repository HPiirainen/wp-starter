<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>
	
<?php while ( have_posts() ) : the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php
			the_title( '<h1>', '</h1>' );
			the_content();
		?>
	
	</div>

<?php endwhile; ?>

<?php get_footer(); ?>