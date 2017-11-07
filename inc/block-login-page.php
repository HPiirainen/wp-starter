<?php

/**
 * Block regular WordPress login page if FloAuth is used
 */
 
/*
function custom_login_page() {
	
    $new_login_page_url = home_url(); // new login page
    global $pagenow;
    if ( $pagenow == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET' ) {
        wp_redirect( $new_login_page_url );
        exit;
    }
    
}

if ( !is_user_logged_in() ) {
    add_action( 'init', 'custom_login_page' );
}
*/
