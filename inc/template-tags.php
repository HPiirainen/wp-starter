<?php

/**
 * Get single post datetime markup
 */
function flo_starter_get_single_post_datetime() {
	return '<time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . esc_html( get_the_date( 'j.n.Y' ) ) . '</time>';
}

/**
 * Get single post categories as a linked list
 */
function flo_starter_get_single_post_categories() {
	$output = '';
	$categories = get_the_category();
	if ( ! empty( $categories ) ) {
		$output .= '<ul class="post-categories">';
		foreach ( $categories as $cat ) {
			$output .= '<li><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></li>';
		}
		$output .= '</ul>';
	}
	return $output;
}

/**
 * Get a formatted date string from start and end date
 */
function flo_starter_formatted_dates( $start_date, $end_date, $separator = '&ndash;' ) {
	if ( ! $end_date ) {
		return date( 'j.n.Y', strtotime( $start_date ) );
	}

	if ( $start_date > $end_date ) {
		return $separator;
	}

	$start_date = date( 'j.n.Y', strtotime( $start_date ) );
	$end_date = date( 'j.n.Y', strtotime( $end_date ) );
	$start_year = date( 'Y', strtotime( $start_date ) );
	$start_month = date( 'n', strtotime( $start_date ) );
	$start_day = date( 'j', strtotime( $start_date ) );
	$end_year = date( 'Y', strtotime( $end_date ) );
	$end_month = date( 'n', strtotime( $end_date ) );
	$end_day = date( 'j', strtotime( $end_date ) );

	if ( $start_year !== $end_year ) {
		return $start_date . $separator . $end_date;
	}

	if ( $start_month !== $end_month ) {
		return date( 'j.n.', strtotime( $start_date ) ) . $separator . $end_date;
	}

	if ( $start_day !== $end_day ) {
		return date( 'j.', strtotime( $start_date ) ) . $separator . $end_date;
	}

	return $start_date;
}

/**
 * Create sub-nav
 *
 * Shows siblings and children, to be used in sidebars if needed
 */
function flo_starter_get_hierarchical_pages() {
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
				'<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' .
				esc_html( $page->post_title ) .
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
								'<a href="' . esc_url( get_permalink( $child->ID ) ) . '">' . esc_html( $child->post_title ) . '</a>' .
							'</li>';
					}
					echo '</ul>';
				}
			}
		}
		echo '</ul></nav></aside>';
	endif;
}

function flo_starter_get_category_list() {
	global $cat;

	$categories = get_categories();
	
	if ( $categories ) {
		echo '<div class="col-12 col-md-3">';
		echo '<h3>' . esc_html( 'Kategoriat' ) . '</h3>';
		echo '<div class="nav flex-column nav-pills"><ul class="list-unstyled">';
			foreach ( $categories as $category ) {
				echo '<li class="nav-link ' . ( $cat === $category->term_id ? "active" : "" ) . '">' .
						'<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->cat_name ) . '</a>' .
					'</li>';
			}
		echo '</ul></div>';
		echo '</div>';
	}
}

function flo_starter_the_yoast_breadcrumbs( $prefix = '', $suffix = '' ) {
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( $prefix, $suffix );
	} else {
		echo '';
	}
}
