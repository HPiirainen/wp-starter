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

/**
 * Fix for Yoast breadcrumbs on single event pages
 * Does not show correct links for single events
 */
function flo_starter_events_wpseo_breadcrumb_output( $output ) {
    if ( is_singular( 'tribe_events' ) ) {
        $queried_object = get_queried_object();
        $obj = get_post_type_object( 'tribe_events' );
        // Home page link
        $to = '<span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="' . esc_url( home_url( '/' ) ) . '" rel="v:url" property="v:title">' . esc_html__( 'Etusivu' ) . '</a> &gt; ';
        // Events page link
        $to .= '<span rel="v:child" typeof="v:Breadcrumb"><a href="' . esc_url( tribe_get_events_link() ) . '" rel="v:url" property="v:title">' . $obj->labels->name . '</a> &gt; ';
        // Single event title
        $to .= '<span class="breadcrumb_last">' . kotiseutuliitto_truncate_event_title( $queried_object->post_title ) . '</span>';
        // Close elements
        $to .= '</span></span></span>';
        $output = $to;
    }
    return $output;
}
add_filter( 'wpseo_breadcrumb_output', 'flo_starter_events_wpseo_breadcrumb_output' );

function flo_starter_truncate_event_title( $title ) {
	$limit = 50;
	if ( strlen( $title ) > $limit ) {
		$title = substr( $title, 0, $limit - 3 ) . '...';
	}
	return $title;
}
