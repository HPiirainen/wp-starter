<?php

function theme_name_theme_setup() {
	/**
	 * Theme supports
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/**
	 * Register main menu
	 */
	register_nav_menu( 'primary', esc_html__( 'Primary', 'theme_name' ) );
	
	/**
	 * Load text domain
	 */
	load_theme_textdomain( 'theme_name', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'theme_name_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function theme_name_scripts_styles() {
    wp_enqueue_script( 'theme_name-bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array( 'jquery' ), true, true );
    wp_enqueue_script( 'theme_name-mainjs',  get_template_directory_uri() . '/js/jquery.main.js', array('jquery'), true, true );
    
	wp_enqueue_style( 'theme_name-bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'theme_name-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts_styles' );

/**
 * Add 'active' class to current / ancestor nav items
 */
function special_nav_class( $classes, $item ) {
    if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-page-ancestor', $classes ) ) {
             $classes[] = 'active ';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 2 );

/**
 * Modify excerpts
 */
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Custom pagination
 */
function theme_name_pagination() {
	$pagination_args = array(
			'type' => 'list',
			'prev_text' => __('« <span>Edellinen</span>'),
			'next_text' => __('<span>Seuraava</span> »'),
		);
	return paginate_links( $pagination_args );
}

// For 2nd level sub-navs only, modify HTML to fit into layout
function get_hierarchical_pages() {
    global $post;
    $ancestors = get_post_ancestors( $post->ID );
    $top_level = ( $ancestors ) ? $ancestors[ count( $ancestors )-1 ] : $post->ID;
    
    $args = array(
        'parent' => $top_level,
        'sort_column' => 'menu_order',
    );
    $top_pages = get_pages( $args );
    
    if ( $top_pages ) :
        echo '<aside id="sidebar" class="col-sm-4 col-xs-12">' .
            '<nav class="side-nav text-uppercase">' . 
                '<ul>';
                
        foreach ( $top_pages as $page ) {
            echo '<li class="' . ( $post->ID == $page->ID ? "active" : "" ) . '">' .
                '<a href="' . get_permalink( $page->ID ) . '">' .
                        $page->post_title .
                '</a>' .
            '</li>';
    
            if ( $post->ID == $page->ID || $post->post_parent == $page->ID ) {
                $children_args = array(
                    'sort_column' => 'menu_order',
                    'child_of' => $page->ID,
                );
                $children = get_pages( $children_args );
                
                if ( $children ) {
                    echo '<ul class="child-list">';
                    foreach ( $children as $child ) {
                        echo '<li class="' . ( $post->ID == $child->ID ? "active" : "" ) . '">' .
                                '<a href="' . get_permalink( $child->ID ) . '">' . $child->post_title . '</a>' .
                            '</li>';
                    }
                    echo '</ul>';   
                }
            }
        }
        echo '</ul></nav></aside>';
    endif;
}

/* ACF Pro */
/*
if ( function_exists('acf_add_options_page') ) {
	$theme_settings_args = array(
		'page_title' => 'Teeman asetukset',
		'menu_title' => 'Teeman asetukset',
		'menu_slug' => 'theme-settings',
		'redirect' => true
	);
	
	$child_settings_args = array(
		'page_title' => 'Alasivu',
		'menu_title' => 'Alasivu',
		'parent_slug' => 'theme-settings'
	);
	
	acf_add_options_page( $theme_settings_args );
	acf_add_options_sub_page( $child_settings_args );	
}
*/

/* Yoast SEO */
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

// TODO: If site integrated with FloMembers, uncomment next sections
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

?>