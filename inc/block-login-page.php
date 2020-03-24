<?php

/**
 * Block regular WordPress login page if FloAuth is used
 */
function custom_login_page() {
	$new_login_page_url = home_url(); // new login page
	global $pagenow;
	if ( 'wp-login.php' === $pagenow && 'GET' === $_SERVER['REQUEST_METHOD'] ) {
		wp_safe_redirect( $new_login_page_url );
		exit;
	}
}

if ( ! is_user_logged_in() ) {
	add_action( 'init', 'custom_login_page' );
}
