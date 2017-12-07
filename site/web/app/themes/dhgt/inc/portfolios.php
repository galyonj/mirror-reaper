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

// Register two custom taxonomies for the portfolios
function register_portfolio_taxonomies() {

	// Register the artist so that each portfolio
	// item can be associated with a specific artist.
	$artist_labels = array(
		'add_new_item'  => __( 'Add New Artist', 'dhgt' ),
		'all_items'     => __( 'All Artists', 'dhgt' ),
		'edit_item'     => __( 'Edit Artist', 'dhgt' ),
		'menu_name'     => __( 'Artists', 'dhgt' ),
		'name'          => _x( 'Artists', 'taxonomy general name', 'dhgt' ),
		'new_item_name' => __( 'New Artist Name', 'dhgt' ),
		'not_found'     => __( 'No artists found', 'dhgt' ),
		'search_items'  => __( 'Search Artists', 'dhgt' ),
		'singular_name' => _x( 'Artist', 'taxonomy singular name', 'dhgt' ),
		'update_item'   => __( 'Update Artist', 'dhgt' ),
	);

	$artist_args = array(
		'hierarchical'      => false,
		'labels'            => $artist_labels,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
		'show_admin_column' => true,
		'show_ui'           => true,
		'public'            => false,
	);

	register_taxonomy( 'artist', 'artist_portfolio', $artist_args );

	// Now we register the portfolio gallery type. This will be
	// formatted like categories so that we can differentiate
	// between, say, a piercing portfolio and a tattoo portfolio,
	// and then further between different styles.
	$gallery_labels = array(
		'add_new_item'      => __( 'Add New Gallery', 'dhgt' ),
		'all_items'         => __( 'All Galleries', 'dhgt' ),
		'edit_item'         => __( 'Edit Gallery', 'dhgt' ),
		'menu_name'         => __( 'Galleries', 'dhgt' ),
		'name'              => _x( 'Galleries', 'taxonomy general name', 'dhgt' ),
		'new_item_name'     => __( 'New Gallery Name', 'dhgt' ),
		'not_found'         => __( 'No galleries found', 'dhgt' ),
		'parent_item_colon' => __( 'Parent Gallery:', 'dhgt' ),
		'search_items'      => __( 'Search Galleries', 'dhgt' ),
		'singular_name'     => _x( 'Gallery', 'taxonomy singular name', 'dhgt' ),
		'update_item'       => __( 'Update Gallery', 'dhgt' ),
	);

	$gallery_args = array(
		'hierarchical'      => true,
		'labels'            => $gallery_labels,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
		'show_admin_column' => true,
		'show_ui'           => true,
		'public'            => false,
	);

	register_taxonomy( 'gallery', 'artist_portfolio', $gallery_args );
}
add_action( 'init', 'register_portfolio_taxonomies', 0 );