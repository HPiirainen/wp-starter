<?php
/**
 * The template for displaying category posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

	<div class="container-fluid">
        <div class="row">
            <?php get_sidebar(); ?>
			
			<?php
			if ( have_posts() ) : ?>
			
				<h1 class=""><?php echo single_cat_title(); ?></h1>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					
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
