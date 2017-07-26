<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php the_archive_title( '<h1>', '</h1>' ); ?>
	
	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php // get_template_part( 'template-parts/content', get_post_type() ); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php
			the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
			the_excerpt();
		?>
		
	<?php endwhile; ?>

	<div class="pagination">
		
		<?php echo theme_name_pagination(); ?>
		
	</div>

<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'none' ); ?>
	
<?php endif; ?>

<?php get_footer(); ?>
