<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="wrapper">
		<header id="header" class="text-uppercase navbar-default">
    		<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
    					<div class="logo">
    						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
    						    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" height="61" width="143" alt="crohn ja colitis ry">
    				        </a>
    				    </div>
						<div class="navbar navbar-default" role="navigation">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu-collapse">
								<span class="sr-only"><?php esc_html_e('Toggle navigation', 'theme_name'); ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#"><?php esc_html_e('valikko', 'theme_name'); ?></a>
							<div class="collapse navbar-collapse" id="primary-menu-collapse">
								<?php $menu_args = array(
								    'theme_location'  => '',
                                	'menu'            => 'Primary',
                                	'container'       => 'nav',
                                	'container_class' => '',
                                	'container_id'    => 'nav',
                                	'menu_class'      => '',
                                	'menu_id'         => '',
                                	'echo'            => true,
                                	'fallback_cb'     => 'wp_page_menu',
                                	'before'          => '',
                                	'after'           => '',
                                	'link_before'     => '',
                                	'link_after'      => '',
                                	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                	'depth'           => 0,
                                	'walker'          => ''
                                );?>
								<?php wp_nav_menu( $menu_args ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
