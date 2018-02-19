<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 */

get_header(); ?>

<div class="error-404">

	<h1><?php esc_html_e( 'Sivua ei löytynyt' ); ?></h1>

	<p><?php esc_html_e( 'Valitsemaasi sivua ei löytynyt. Voit yrittää löytää etsimäsi sivun alla olevan hakukentän avulla.' ); ?></p>

	<?php get_search_form(); ?>

</div>

<?php get_footer();