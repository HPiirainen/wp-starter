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
	
		<?php // get_template_part( 'template-parts/content', 'post' ); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			
			<time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'j.n.Y' ); ?></time>
			
			<?php the_excerpt(); ?>
			
		</div>
		
	<?php endwhile; ?>
	
	<div class="pagination">
		
		<?php echo theme_name_pagination(); ?>
		
	</div>

<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'none' ); ?>
	
<?php endif; ?>

<?php get_footer(); ?>
