<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Test_theme
 */

?>

<?php if ( is_search() ) : ?>

	<p><?php esc_html_e( 'Hakusanalla ei löytynyt tuloksia. Kokeile uudestaan eri hakusanalla.' ); ?></p>

<?php else : ?>

	<h1><?php esc_html_e( 'Sisältöä ei löytynyt' ); ?></h1>

	<p><?php esc_html_e( 'Sisältöä ei valitettavasti löytynyt.' ); ?></p>

<?php endif; ?>
