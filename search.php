<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	
	<h1><?php printf( esc_html__( 'Hakutulokset: %s', 'theme_name' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<?php global $wp_query; ?>
	<p><?php printf( esc_html__( 'Haulla löytyi %s tulosta', 'theme_name' ), $wp_query->found_posts ); ?></p>
	
	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php //get_template_part( 'template-parts/content', get_post_type() ); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php
				the_title( sprintf( '<h2 class=""><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
				the_excerpt();
			?>
			
		</div>
			
	<?php endwhile; ?>

	<div class="pagination">
							
		<?php echo paginate_links(); ?>
		
	</div>
	
<?php else : ?>
		
	<?php get_template_part( 'template-parts/content', 'none' ); ?>
	
<?php endif; ?>

<?php get_footer(); ?>
