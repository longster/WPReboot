<?php
// Pagination
function wpreboot_pagination() {
	global $wp_query;
 
	$big = 999999999; // This needs to be an unlikely integer
 
	// For more options and info view the docs for paginate_links()
	// http://codex.wordpress.org/Function_Reference/paginate_links
	$paginate_links = paginate_links( array(
		'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'mid_size' => 5,
		'prev_next' => True,
	    'prev_text' => __('&laquo;'),
	    'next_text' => __('&raquo;'),
		'type' => 'list'
	) );
 
	// Display the pagination if more than one page is found
	if ( $paginate_links ) {
		//echo '<ul class="pagination">';
		echo $paginate_links;
		//echo '</ul><!--// end .pagination -->';
	}
}

/*
 * Replace page-numbers to pagination NOT WORKING AT THE MOMENT.. still trying to debug this shit.
 */
function wpreboot_paginate_css_class( $classes ) {
	if ( in_array('page-numbers', $classes ) OR in_array( 'page-numbers', $classes ) )
		$classes[] = 'pagination';

	return $classes;
}
add_filter( 'paginate_css_class', 'wpreboot_paginate_css_class' );


/**
 * A fallback when no navigation is selected by default, otherwise it throws some nasty errors in your face.
 */
function wpreboot_menu_fallback() {
	echo '<span class="fallback">';
	// Translators 1: Link to Menus, 2: Link to Customize
  	printf( __( 'Assign menu to the Primary Nav under %1$s or %2$s the design.', 'wpreboot' ),
  		sprintf(  __( '<a href="%s">Menus</a>', 'wpreboot' ),
  			get_admin_url( get_current_blog_id(), 'nav-menus.php' )
  		),
  		sprintf(  __( '<a href="%s">Customize</a>', 'wpreboot' ),
  			get_admin_url( get_current_blog_id(), 'customize.php' )
  		)
  	);
  	echo '</span>';
}


/**
 * class required_walker
 * Custom output to enable the the Bootstrap Navigation style.
 */
class WPReboot_Nav_Walker extends Walker_Nav_Menu {

	/**
	 * @see Walker_Nav_Menu::start_lvl()
	 */
	function start_lvl( &$output, $depth ) {
		$output .= "\n<ul class=\"dropdown-menu\">\n";
	}

	/**
	 * @see Walker_Nav_Menu::start_el()
	 */
	function start_el( &$output, $item, $depth, $args ) {
		global $wp_query;
		
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$li_attributes = $class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		if ( $args->has_children ) {
			$classes[] = 'dropdown';
			$li_attributes .= ' data-dropdown="dropdown"';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		$attributes	=	$item->attr_title	? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes	.=	$item->target		? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes	.=	$item->xfn			? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes	.=	$item->url			? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes	.=	$args->has_children	? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

		$item_output	=	$args->before . '<a' . $attributes . '>';
		$item_output	.=	$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output	.=	( $args->has_children ) ? ' <b class="caret"></b>' : '';
		$item_output	.=	'</a>' . $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * @see Walker::display_element()
	 */
	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

		if ( ! $element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = (bool) ( ! empty( $children_elements[$element->$id_field] ) AND $depth != $max_depth - 1 );
		elseif ( is_object(  $args[0] ) )
			$args[0]->has_children = (bool) ( ! empty( $children_elements[$element->$id_field] ) AND $depth != $max_depth - 1 );

		$cb_args = array_merge( array( &$output, $element, $depth ), $args );
		call_user_func_array( array( &$this, 'start_el' ), $cb_args );

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ( $max_depth == 0 OR $max_depth > $depth+1 ) AND isset( $children_elements[$id] ) ) {

			foreach ( $children_elements[ $id ] as $child ) {

				if ( ! isset( $newlevel ) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array( &$output, $depth ), $args );
					call_user_func_array( array( &$this, 'start_lvl' ), $cb_args );
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset( $newlevel ) AND $newlevel ) {
			//end the child delimiter
			$cb_args = array_merge( array( &$output, $depth ), $args );
			call_user_func_array( array( &$this, 'end_lvl' ), $cb_args );
		}

		//end this element
		$cb_args = array_merge( array( &$output, $element, $depth ), $args );
		call_user_func_array( array( &$this, 'end_el' ), $cb_args );
	}
}


/**
 * Adds the active CSS class
 */
function wpreboot_nav_menu_css_class( $classes ) {
	if ( in_array('current-menu-item', $classes ) OR in_array( 'current-menu-ancestor', $classes ) )
		$classes[]	=	'active';

	return $classes;
}
add_filter( 'nav_menu_css_class', 'wpreboot_nav_menu_css_class' );

