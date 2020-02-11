<?php

/**
 * Display pagination
 *
 * @return string
 */
function flo_starter_the_pagination() {
	echo get_the_posts_pagination( array( 'mid_size'  => 3 ) );
}

/**
 * Get single post datetime markup
 *
 * @return string
 */
function flo_starter_get_single_post_datetime() {
	return '<time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . esc_html( get_the_date( 'j.n.Y' ) ) . '</time>';
}

/**
 * Get meta data for a single post
 *
 * @param bool $display_terms Display post terms?
 * @param string $taxonomy Taxonomy name
 * @param string $separator Separator for elements
 * @param string $term_separator Separator for terms
 * @return string
 */
function flo_starter_get_single_post_meta_data( $display_terms = true, $taxonomy = 'category', $separator = ' | ', $term_separator = ', ' ) {
	$datetime = flo_starter_get_single_post_datetime();
	$output = '<span class="post-datetime">' . $datetime . '</span>';
	if ( $display_terms ) {
		$term_list = get_the_term_list( get_the_id(), $taxonomy, '', $term_separator, '' );
		if ( $term_list ) {
			$output .= $separator . '<span class="post-terms post-' . esc_attr( $taxonomy ) . '">' . $term_list . '</span>';
		}
	}
	return $output;
}

/**
 * Get a formatted date string from start and end date
 *
 * @param string $start_date
 * @param string $end_date
 * @param string $separator
 * @return string
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
	$current_id = get_the_id();
	$ancestors = get_post_ancestors( $current_id );
	$top_level = ( $ancestors ) ? $ancestors[ count( $ancestors )-1 ] : $current_id;
	$output = '';

	$args = array(
		'parent' => $top_level,
		'sort_column' => 'menu_order',
	);
	$top_pages = get_pages( $args );

	if ( $top_pages ) {
		$output .= '<ul>';

		foreach ( $top_pages as $page ) {
			$li_classes = [];
			$child_list = '';
			if ( $current_id === $page->ID || wp_get_post_parent_id( $current_id ) === $page->ID ) {
				$li_classes[] = 'active';
				$children_args = array(
					'sort_column' => 'menu_order',
					'child_of' => $page->ID,
				);
				$children = get_pages( $children_args );
				if ( $children ) {
					$li_classes[] = 'has-children';
					$child_list .= '<ul>';
					foreach ( $children as $child ) {
						$child_list .= '<li class="' . ( $current_id === $child->ID ? "active" : "" ) . '">';
						$child_list .= '<a href="' . esc_url( get_permalink( $child->ID ) ) . '">' . esc_html( $child->post_title ) . '</a>';
						$child_list .= '</li>';
					}
					$child_list .= '</ul>';
				}
			}
			$output .= '<li class="' . esc_attr( implode( ' ', $li_classes ) ) . '">';
			$output .= '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">';
			$output .= esc_html( $page->post_title );
			$output .= '</a>';
			$output .= $child_list;
			$output .= '</li>';
		}
		$output .= '</ul>';
	}
	return $output;
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

function flo_starter_the_yoast_breadcrumb( $prefix = '', $suffix = '' ) {
	if ( function_exists( 'yoast_breadcrumb' ) ) {
		yoast_breadcrumb( $prefix, $suffix );
	} else {
		echo '';
	}
}
