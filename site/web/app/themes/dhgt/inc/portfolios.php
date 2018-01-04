<?php
/**
 * Create custom post types to handle artists and portfolio galleries
 * The goal is to create a parent->child relationship in which there can be many artists,
 * and each artist can be associated with many portfolio galleries.
 * Version: 1.0
 */

// Register Artist custom post type
function create_portfolio_cpts() {

	$artist_labels = array(
		'name'                  => _x( 'Artists', 'Post Type General Name', 'dhgt' ),
		'singular_name'         => _x( 'Artist', 'Post Type Singular Name', 'dhgt' ),
		'menu_name'             => __( 'Artists', 'dhgt' ),
		'name_admin_bar'        => __( 'Artists', 'dhgt' ),
		'archives'              => __( 'Artist Archives', 'dhgt' ),
		'attributes'            => __( 'Artist Attributes', 'dhgt' ),
		'parent_item_colon'     => __( 'Parent Artist:', 'dhgt' ),
		'all_items'             => __( 'All Artists', 'dhgt' ),
		'add_new_item'          => __( 'Add New Artist', 'dhgt' ),
		'add_new'               => __( 'Add New', 'dhgt' ),
		'new_item'              => __( 'New Artist', 'dhgt' ),
		'edit_item'             => __( 'Edit Artist', 'dhgt' ),
		'update_item'           => __( 'Update Artist', 'dhgt' ),
		'view_item'             => __( 'View Artist', 'dhgt' ),
		'view_items'            => __( 'View Artists', 'dhgt' ),
		'search_items'          => __( 'Search Artist', 'dhgt' ),
		'not_found'             => __( 'Not found', 'dhgt' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dhgt' ),
		'featured_image'        => __( 'Featured Image', 'dhgt' ),
		'set_featured_image'    => __( 'Set featured image', 'dhgt' ),
		'remove_featured_image' => __( 'Remove featured image', 'dhgt' ),
		'use_featured_image'    => __( 'Use as featured image', 'dhgt' ),
		'insert_into_item'      => __( 'Insert into artist', 'dhgt' ),
		'uploaded_to_this_item' => __( 'Uploaded to this artist', 'dhgt' ),
		'items_list'            => __( 'Artists list', 'dhgt' ),
		'items_list_navigation' => __( 'Artists list navigation', 'dhgt' ),
		'filter_items_list'     => __( 'Filter artists list', 'dhgt' ),
	);

	$artist_args = array(
		'can_export'      => true,
		'capability_type' => 'page',
		'label'           => __( 'Artist', 'dhgt' ),
		'labels'          => $artist_labels,
		'hierarchical'    => true,
		'menu_icon'       => 'dashicons-admin-customizer',
		'public'          => true,
		'supports'        => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
	);
	register_post_type( 'artist', $artist_args );

	$portfolio_labels = array(
		'name'           => _x( 'Portfolios', 'Post Type General Name', 'dhgt' ),
		'singular_name'  => _x( 'Portfolio', 'Post Type Singular Name', 'dhgt' ),
		'menu_name'      => __( 'Portfolios', 'dhgt' ),
		'name_admin_bar' => __( 'Portfolios', 'dhgt' )
	);
	$portfolio_args = array(
		'label'        => __( 'Portfolio', 'dhgt' ),
		'labels'       => $portfolio_labels,
		'hierarchical' => false,
		'menu_icon'    => 'dashicons-format-gallery',
		'public'       => true
	);
	register_post_type( 'portfolio', $portfolio_args );

}
add_action( 'init', 'create_portfolio_cpts' );

function add_portfolio_meta_boxes() {
	add_meta_box( 'portfolio-parent', 'Select an Artist', 'portfolio_attributes_meta_box', 'portfolio', 'side', 'low' );
}
add_action( 'add_meta_boxes', 'add_portfolio_meta_boxes' );

function portfolio_attributes_meta_box( $post ) {

	$post_type_object = get_post_type_object( $post->post_type );

	$pages = array(
		'post_type'        => 'artist',
		'selected'         => $post->post_parent,
		'name'             => 'parent_id',
		'sort_column'      => 'menu_order, post_title',
		'echo'             => true,
	);

	wp_dropdown_pages( $pages );
}

function portfolio_rewrite_rules() {
	add_rewrite_tag('%portfolio%', '([^/]+)', 'portfolio=');
	add_permastruct('portfolio', '/artists/%artist%/%portfolio%', false);
	add_rewrite_rule('^artists/([^/]+)/([^/]+)/?','index.php?portfolio=$matches[2]','top');
}
add_action( 'init', 'portfolio_rewrite_rules' );

function portfolio_permalinks($permalink, $post, $leavename) {
	$post_id = $post->ID;
	if($post->post_type != 'portfolio' || empty($permalink) || in_array($post->post_status, array('draft', 'pending',
			'auto-draft')))
		return $permalink;
	$parent = $post->post_parent;
	$parent_post = get_post( $parent );
	$permalink = str_replace('%artist%', $parent_post->post_name, $permalink);
	return $permalink;
}
add_filter('post_type_link', 'portfolio_permalinks', 10, 3);