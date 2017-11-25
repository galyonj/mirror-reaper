<?php
/**
 * This code adds a button th contain a formats drop-down menu
 * to the WordPress editor. This menu allows users to easily
 * choose and implement special styling options within the
 * TinyMCE editor.
 *
 * @param $buttons
 *
 * @return mixed
 */

function add_style_select_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons', 'add_style_select_buttons' );

/**
 * Returns an array of customized formats
 * for use in the WordPress editor in the
 * hopes that the experience will be more
 * intuitive for content editors.
 *
 * @param $init_array
 *
 * @return mixed
 */

function custom_editor_formats( $init_array ) {

	$style_formats = array(
		// List Styling
		array(
			'title' => __( 'Block-level elements', 'galyon' ),
			'items' => array(
				array(
					'title'    => __( 'Full-Width Well', 'galyon' ),
					'block'    => 'div',
					'classes'  => 'well',
					'wrapper'  => true,
				),
				array(
					'title'    => __( 'Half-Width Well Left', 'galyon' ),
					'block'    => 'div',
					'classes'  => array( 'well', 'half-left' ),
					'wrapper'  => true,
				),
				array(
					'title'    => __( 'Half-Width Well Right', 'galyon' ),
					'block'    => 'div',
					'classes'  => array( 'well', 'half-right' ),
					'wrapper'  => true,
				),
			)
		),
		// Custom List Styling
		array(
			'title' => __( 'Special Lists', 'galyon' ),
			'items' => array(
				array(
					'title' => __( 'Two Column List', 'galyon' ),
					'selector' => 'ul',
					'classes'  => 'two-column'
				),
				array(
					'title' => __( 'Two Column Text List', 'galyon' ),
					'selector' => 'ul',
					'classes'  => 'text-columns'
				),
				array(
					'title' => __( 'Three Column List', 'galyon' ),
					'selector' => 'ul',
					'classes'  => 'three-column'
				),
			)
		),
		// Custom Type Styling
		array(
			'title' => __( 'Special Type Styles', 'galyon' ),
			'items' => array(
				array(
					'title'    => __( 'Button', 'galyon' ),
					'selector' => 'a',
					'classes'  => array( 'btn', 'btn-primary' )
				),
				array(
					'title'    => __( 'Lead Paragraph', 'galyon' ),
					'selector' => 'p',
					'classes'  => 'lead'
				),
				array(
					'title'    => __( 'Blockquote Citation', 'galyon' ),
					'block'    => 'footer'
				)
			)
		),
		// Tables
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array[ 'style_formats' ] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'custom_editor_formats' );