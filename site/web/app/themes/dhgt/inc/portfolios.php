<?php
/**
 * Custom post type to handle artist portfolios
 */

// Register Custom Post Type
function artist_portfolio_post_type() {

	$labels = array(
		'add_new'       => __( 'Add New', 'dhgt' ),
		'add_new_item'  => __( 'Add New Image', 'dhgt' ),
		'menu_name'     => __( 'Portfolios', 'dhgt' ),
		'name'          => __( 'Portfolio', 'dhgt' ),
		'singular_name' => __( 'Portfolio', 'dhgt' ),
		'all_items'     => __( 'All Images', 'dhgt' )
	);

	$args = array(
		'description'         => __( 'Easily create and curate artist portfolios for Donno\'s Higher Ground Tattoo', 'dhgt' ),
		'exclude_from_search' => true,
		'has_archive'         => false,
		'hierarchical'        => true,
		'label'               => __( 'Portfolios', 'dhgt' ),
		'labels'              => $labels,
		'public'              => true,
		'menu_position'       => 4,
		'publicly_queryable'  => false,
		'query_var'           => false,
		'rewrite'             => array('slug' => 'gallery-item'),
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'supports'            => array( 'title', 'thumbnail' ),
		'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'artist_portfolio', $args );

}
add_action( 'init', 'artist_portfolio_post_type', 0 );


// Get the post thumbnail so we can display it
// in the custom post type dashboard section
function backend_preview_thumb( $post_ID ) {

	// Store the ID of the current post thumbnail
	$post_thumbnail_ID = get_post_thumbnail_id( $post_ID );

	// If there a post_thumbnail_ID exists,
	// give us the thumbnail size of the
	// associated post thumbnail image
	if( $post_thumbnail_ID ) {

		$post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_ID, 'thumbnail' );

		return $post_thumbnail_img[0];
	}
}

// Add a column to the post type preview screen
// to show us the image thumbnails for auditing
// and review purposes.
function preview_column_head( $defaults ) {

	$defaults[ 'featured_image' ] = 'Image';
	return $defaults;
}
add_filter( 'manage_posts_columns', 'preview_column_head' );

function preview_thumb_column_output( $column_name, $post_ID ) {

	if( $column_name == 'featured_image' ) {
		$post_featured_image = backend_preview_thumb( $post_ID );

		if( $post_featured_image ) {
			echo '<img src="' . $post_featured_image . '">';
		}
	}
}
add_action( 'manage_posts_custom_column', 'preview_thumb_column_output', 10, 2 );