<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

	<div class="container-fluid">
        <div class="row">
            <?php get_sidebar(); ?>

			<?php the_archive_title( '<h1 class="">', '</h1>' ); ?>

			<?php
			if ( have_posts() ) : ?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/* TODO: 
					 * Check what custom post types are needed and choose which option to use.
					 * If multiple custom post types, you can create separate templates for each.
					 * Remember to also include template-parts/content-none.php.
					 * Other option is to simply print content directly to this template.
					 */
					
					// OPTION 1
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					//get_template_part( 'template-parts/content', get_post_format() );
					
					// OPTION 2
					the_title( '<h2 class="">', '</h2>' );
					the_content();
					
				endwhile;

				// TODO: check if needed and if this function works
				the_posts_navigation();
	
			else :
			
				get_template_part( 'template-parts/content', 'none' );
				
			endif; ?>

		</div>
	</div>

<?php get_footer(); ?>
