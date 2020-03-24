<?php

/**
 * Create Theme Options pages with ACF Pro
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	$theme_settings_args = [
		'page_title' => 'Teeman asetukset',
		'menu_title' => 'Teeman asetukset',
		'menu_slug'  => 'theme-settings',
		'redirect'   => true,
	];

	$child_settings_args = [
		'page_title'  => 'Alasivu',
		'menu_title'  => 'Alasivu',
		'parent_slug' => 'theme-settings',
	];

	acf_add_options_page( $theme_settings_args );
	acf_add_options_sub_page( $child_settings_args );
}
