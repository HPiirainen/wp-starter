<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	
	<?php //get_template_part( 'template-parts/content', get_post_type() ); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php the_title( '<h1>', '</h1>' ); ?>
		
		<time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'j.n.Y' ); ?></time>
		
		<?php the_content(); ?>
	
	</div>
	
<?php endwhile; ?>

<?php get_footer(); ?>