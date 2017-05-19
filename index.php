<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php if( is_home() && !is_front_page() ) : ?>
	
		<h1><?php single_post_title(); ?></h1>
		
	<?php endif; ?>
								
	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php // get_template_part( 'template-parts/content', get_post_type() ); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
			<?php the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php the_excerpt(); ?>
			
		</div>
	
	<?php endwhile; ?>
					
	<div class="pagination">
		
		<?php echo paginate_links(); ?>
		
	</div>
	
<?php else : ?>
	
	<?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

<?php get_footer(); ?>