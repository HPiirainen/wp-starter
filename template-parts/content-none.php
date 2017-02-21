<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Test_theme
 */

?>
	
	<h1 class="page-title"><?php esc_html_e( 'Sisältöä ei löytynyt', 'theme_name' ); ?></h1>
	
	<?php if ( is_search() ) : ?>
	
		<p><?php esc_html_e( 'Hakusanalla ei löytynyt tuloksia. Kokeile uudestaan eri hakusanalla.', 'theme_name' ); ?></p>
		<?php get_search_form();
	
	else : ?>
	
		<p><?php esc_html_e( 'Sisältöä ei valitettavasti löytynyt.', 'theme_name' ); ?></p>
		<?php
			get_search_form();
	
	endif; ?>
