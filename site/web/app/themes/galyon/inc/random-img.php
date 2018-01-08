<?php

function cat_pic() {
	$dir  = get_stylesheet_directory() . '/img/404/';
	$url  = get_stylesheet_directory_uri() . '/img/404/';
	$imgs = glob( $dir . '*.jpg' );

	//echo '<img src="' . str_replace( $dir, $url, $rand) . '" alt="My cats are the best cats" class="img-responsive">';

	//var_dump( str_replace( $dir, $url, array_rand( $imgs, 1 ) ) );

	var_dump( array_rand( $imgs ) );
}