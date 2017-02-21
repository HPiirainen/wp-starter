<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */

get_header(); ?>

	<div class="container-fluid">
        <div class="row">
            <?php get_sidebar(); ?>
			<div class="error-404">
				<div class="content">
					<h1><?php esc_html_e('Sivua ei löytynyt', 'theme_name'); ?></h1>
					<?php // TODO: modify text and hide/show search form accordingly ?>
					<p><?php esc_html_e( 'Valitsemaasi sivua ei löytynyt. Voit yrittää löytää etsimäsi sivun alla olevan hakukentän avulla.', 'test_theme' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
        </div>
	</div>
<?php get_footer(); ?>