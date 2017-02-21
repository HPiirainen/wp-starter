<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<main id="" role="">
    <?php get_sidebar(); ?>
	<div id="" class="">
		<?php
			
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			/* TODO: 
			 * Choose which option to use:
			 * 1. Separate template for page content
			 * 2. Simply print content directly to this template.
			 */
			
			// OPTION 1
			//get_template_part( 'template-parts/content', 'page' );
			
			// OPTION 2
			the_title( '<h1 class="">', '</h1>' );
			the_content();

		endwhile;
		?>

    </div>
</main>
<?php get_footer(); ?>