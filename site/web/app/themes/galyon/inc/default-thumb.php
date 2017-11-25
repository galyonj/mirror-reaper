<?php

/**
 * Set the default post thumbnail image as a fallback
 * @param $html
 *
 * @return string
 */
function default_post_thumbnail( $html ) {

	if( empty( $html ) ) {
		$html = '<img src="' . trailingslashit( get_stylesheet_directory_uri() ) . 'img/default-img.jpg">';
	}

	return $html;
}
add_filter( 'post_thumbnail_html', 'default_post_thumbnail' );