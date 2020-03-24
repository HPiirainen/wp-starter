<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php the_title( '<h1>', '</h1>' ); ?>

	<?php the_content(); ?>

	<?php
	$articles_args = [
		'posts_per_page' => 6,
	];
	$article_query = new WP_Query( $articles_args );
	?>

	<?php while ( $article_query->have_posts() ) : $article_query->the_post(); ?>

		<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

	<?php
	endwhile;
	wp_reset_postdata();
	?>

	<?php printf( '<a href="%s">%s</a>', esc_url( get_permalink( get_option( 'page_for_posts' ) ) ), esc_html( 'Kaikki uutiset' ) ); ?>

<?php endwhile; ?>

<?php get_footer();
