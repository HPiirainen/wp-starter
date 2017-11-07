<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 */

get_header(); ?>

<h1><?php printf( esc_html__( 'Hakutulokset: %s', 'theme_name' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

<?php if ( have_posts() ) : ?>

	<?php global $wp_query; ?>

	<p><?php printf( esc_html__( 'Haulla löytyi %s tulosta', 'theme_name' ), $wp_query->found_posts ); ?></p>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'search' ); ?>

	<?php endwhile; ?>

	<?php the_posts_pagination( array( 'mid_size'  => 3 ) ); ?>

<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

<?php get_footer();