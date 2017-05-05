<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 */

get_header(); ?>

<main id="" role="">
    <?php get_sidebar(); ?>
	<div id="" class="">
		<?php // TODO: Check that displaying query and result count work! ?>
		<?php
		if ( have_posts() ) : ?>
			
			<h1 class=""><?php printf( esc_html__( 'Hakutulokset: %s', 'theme_name' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php global $wp_query; ?>
			<p><?php printf( esc_html__( 'Haulla löytyi %s tulosta', 'theme_name' ), $wp_query->found_posts ); ?></p>
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
				the_title( sprintf( '<h2 class=""><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
				the_excerpt();
				
			endwhile;

			echo paginate_links();

		else :
			
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</div><!-- #main -->
</main>

<?php get_footer(); ?>
