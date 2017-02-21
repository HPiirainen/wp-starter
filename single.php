<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header(); ?>

<main id="" role="">
    <?php get_sidebar(); ?>
	<div id="" class="">
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/* TODO: 
				 * Choose which option to use:
				 * 1. Separate template for each content type
				 * 2. Simply print content directly to this template.
				 */
				
				// OPTION 1
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_format() );
				
				// OPTION 2
				the_title( '<h1 class="">', '</h1>' );
				the_content();

			endwhile;

		else :
			
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

    </div>
</main>
<?php get_footer(); ?>