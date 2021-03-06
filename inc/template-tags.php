<?php

/**
 * Display pagination
 *
 * @return string
 */
function flo_starter_the_pagination() {
	the_posts_pagination( [ 'mid_size' => 3 ] );
}

/**
 * Get single post datetime markup
 *
 * @return string
 */
function flo_starter_get_single_post_datetime() {
	return sprintf( '<time datetime="%s">%s</time>', esc_attr( get_the_date( 'Y-m-d' ) ), esc_html( get_the_date() ) );
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
 * Converts ACF Link array to link / button markup
 *
 * @param array $link_array
 * @param array $classes HTML classes to add
 * @param string $before HTML output before link text
 * @param string $after HTML output ffter link text
 * @return string
 */
function flo_starter_construct_link_from_array( $link_array, $classes = [], $before = '', $after = '' ) {
	if ( ! is_array( $link_array ) ) {
		return '';
	}
	$class_string = ! empty( $classes ) ? 'class="' . esc_attr( implode( ' ', $classes ) ) . '"' : '';
	$target_string = '_self' !== $link_array['target'] ? 'target="' . esc_attr( $link_array['target'] ) . '"' : '';
	return sprintf(
		'<a href="%s" %s %s>%s</a>',
		esc_url( $link_array['url'] ),
		$class_string,
		$target_string,
		$before . esc_html( $link_array['title'] ) . $after
	);
}

/**
 * Create sub-nav
 *
 * Shows siblings and children, to be used in sidebars if needed
 */
function flo_starter_get_hierarchical_pages() {
	$current_id = get_the_id();
	$ancestors = get_post_ancestors( $current_id );
	$top_level = ( $ancestors ) ? $ancestors[ count( $ancestors ) - 1 ] : $current_id;
	$output = '';

	$args = [
		'parent'      => $top_level,
		'sort_column' => 'menu_order',
	];
	$top_pages = get_pages( $args );

	if ( $top_pages ) {
		$output .= '<ul>';

		foreach ( $top_pages as $page ) {
			$li_classes = [];
			$child_list = '';
			if ( $current_id === $page->ID || wp_get_post_parent_id( $current_id ) === $page->ID ) {
				$li_classes[] = 'active';
				$children_args = [
					'sort_column' => 'menu_order',
					'child_of'    => $page->ID,
				];
				$children = get_pages( $children_args );
				if ( $children ) {
					$li_classes[] = 'has-children';
					$child_list .= '<ul>';
					foreach ( $children as $child ) {
						$child_list .= '<li class="' . ( $current_id === $child->ID ? 'active' : '' ) . '">';
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
			echo '<li class="nav-link ' . ( $cat === $category->term_id ? 'active' : '' ) . '">' .
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
