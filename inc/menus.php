<?php
	
/**
 * Add 'active' class to current / ancestor nav items
 */
function theme_name_nav_class( $classes, $item ) {
    if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-page-ancestor', $classes ) ) {
             $classes[] = 'active ';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'theme_name_nav_class', 10, 2 );

/**
 * Add custom icons to sub-nav items
 *
 * Uses ACF Pro
 */
function theme_name_wp_nav_menu_objects( $items, $args ) {
	$theme_location = 'primary';
	if( function_exists( 'get_field' ) ) {
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
add_filter( 'wp_nav_menu_objects', 'theme_name_wp_nav_menu_objects', 10, 2 );
