<?php

/**
 * Move Yoast metabox to bottom of page
 */
function theme_name_yoast_to_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'theme_name_yoast_to_bottom' );