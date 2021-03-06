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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div class="logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/logo.png" height="100" width="100" alt="logo">
		</a>
	</div>

	<?php
	$menu_args = [
		'theme_location'  => 'primary',
		'menu'            => '',
		'container'       => 'nav',
		'container_class' => '',
		'container_id'    => 'nav',
		'menu_class'      => '',
		'menu_id'         => '',
		'echo'            => true,
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
	];
	?>
	<?php wp_nav_menu( $menu_args ); ?>
