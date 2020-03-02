<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 */

get_header(); ?>

<h1><?php printf( esc_html__( 'Hakutulokset: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

<?php if ( have_posts() ) : ?>

	<?php global $wp_query; ?>

	<p><?php _e( 'Haulla löytyi ' ) . printf( _n( '%s tulos.', '%s tulosta.', $wp_query->found_posts ), $wp_query->found_posts ); ?></p>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

	<?php endwhile; ?>

	<?php flo_starter_the_pagination(); ?>

<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

<?php get_footer();