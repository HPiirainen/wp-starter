<?php

/**
 * Move Yoast metabox to bottom of page
 */
function flo_starter_yoast_to_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'flo_starter_yoast_to_bottom' );