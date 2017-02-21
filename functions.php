<?php

function theme_name_theme_setup() {
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' ); // TODO: remove if not needed
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	register_nav_menu( 'primary', esc_html__( 'Primary', 'theme_name' ) );
	
	load_theme_textdomain( 'theme_name', get_template_directory() . '/languages' );
	
	/**
     * Use main stylesheet for visual editor
     */
	add_editor_style();
}
add_action( 'after_setup_theme', 'theme_name_theme_setup' );

function theme_name_scripts_styles() {
    // TODO: Check latest versions and check if we can use Bootstrap CSS from a CDN
    
    wp_enqueue_script('theme_name-bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), true, true);
    wp_enqueue_script( 'theme_name-mainjs',  get_template_directory_uri() . '/js/main.js', array('jquery'), true, true );
    
    wp_enqueue_style( 'theme_name-font', '//fonts.googleapis.com/css?family=Work+Sans:400,700,500,800');
	wp_enqueue_style( 'theme_name-bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'theme_name-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts_styles' );




function special_nav_class($classes, $item){
    if( in_array('current-menu-item', $classes) || in_array('current-page-ancestor', $classes) ) {
             $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function custom_excerpt_length($length) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


// For 2nd level sub-navs only, modify HTML to fit into layout
function get_hierarchical_pages() {
    global $post;

    $ancestors = get_post_ancestors( $post->ID );
    $top_level = ($ancestors) ? $ancestors[count($ancestors)-1]: $post->ID;
    $args = array(
        'parent' => $top_level,
        'sort_column' => 'menu_order',
    );
    $top_pages = get_pages( $args );
    if( $top_pages ) :
        echo '<aside id="sidebar" class="col-sm-4 col-xs-12">' .
            '<nav class="side-nav text-uppercase">' . 
                '<ul>';
        foreach( $top_pages as $page ) {
            echo '<li class="' . ($post->ID == $page->ID ? "active" : "") . '">' .
                '<a href="' . get_permalink($page->ID) . '">' .
                        $page->post_title .
                '</a>' .
            '</li>';
    
            if ( $post->ID == $page->ID || $post->post_parent == $page->ID ) {
                $children_args = array(
                    'sort_column' => 'menu_order',
                    'child_of' => $page->ID,
                );
                $children = get_pages( $children_args );
                if ($children) {
                    echo '<ul class="child-list">';
                    foreach( $children as $child ) {
                        echo '<li class="' . ($post->ID == $child->ID ? "active" : "") . '">' .
                                '<a href="' . get_permalink($child->ID) . '">' . $child->post_title . '</a>' .
                            '</li>';
                    }
                    echo '</ul>';
                }
            }
        }
        echo '</ul></nav></aside>';
    endif;
}

// TODO: If site integrated with FloMembers, uncomment next sections
/*
function custom_login_page() {
    $new_login_page_url = home_url(); // new login page
    global $pagenow;
    if( $pagenow == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($new_login_page_url);
        exit;
    }
}

if(!is_user_logged_in()){
    add_action('init','custom_login_page');
}
*/

?>