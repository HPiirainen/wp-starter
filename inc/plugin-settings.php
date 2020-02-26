<?php

/**
 * Move Yoast metabox to bottom of page
 */
function flo_starter_yoast_to_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'flo_starter_yoast_to_bottom' );

/**
 * Add custom headers for SMTP
 */
function flo_starter_custom_smtp_headers( $phpmailer ) {
	$theme_name = get_stylesheet();
	$phpmailer->addCustomHeader( 'X-MC-Tags', "WordPress, wp-{$theme_name}" );
	return $phpmailer;
}
add_filter( 'wp_mail_smtp_custom_options', 'flo_starter_custom_smtp_headers' );
