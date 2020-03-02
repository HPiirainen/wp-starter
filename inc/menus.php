<?php

/**
 * Add 'active' class to current / ancestor nav items
 */
function flo_starter_nav_class( $classes, $item ) {
	$active_classes = array(
		'current-menu-item',
		'current-menu-ancestor',
		'current-page-ancestor',
	);
	$existing_classes = array_intersect( $active_classes, $classes );
	if ( count( $existing_classes ) > 0 ) {
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'flo_starter_nav_class', 10, 2 );

/**
 * Add custom icons to sub-nav items
 * Uses ACF Pro
 */
function flo_starter_wp_nav_menu_objects( $items, $args ) {
	$theme_location = 'primary';
	if ( function_exists( 'get_field' ) ) {
		if ( isset( $args->theme_location ) && $args->theme_location === $theme_location ) {
			foreach( $items as &$item ) {
				$class = get_field( 'icon-class', $item );
				if ( $class ) {
					$item->title = '<i class="' . $class . '"></i> ' . $item->title;
				}
			}
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'flo_starter_wp_nav_menu_objects', 10, 2 );
