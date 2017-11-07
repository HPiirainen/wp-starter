<?php

class Flo_Starter_Walker extends Walker_Nav_Menu {

	/**
	 * Add custom sub-menu markup
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<div class='drop'><ul class='sub-menu'>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul></div>\n";
	}
}

/**
 * Add custom icons in front of sub-nav items
 */
function flo_starter_filter_walker_sub_menu_item( $output, $item, $depth, $args ) {
	if( $depth > 0 ) {
		$output .= '<i class="fa fa-arrow-right" aria-hidden="true"></i>';
	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'flo_starter_filter_walker_sub_menu_item', 10, 4 );