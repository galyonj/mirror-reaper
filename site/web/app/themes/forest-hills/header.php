<?php
/**
 * Header template
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : December 9, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage forest-hills
 */
?>
<!doctype html>
<html class="no-js" lang="<?php echo get_bloginfo( 'language' ); ?>">
	<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="theme-color" content="#333333">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- icons and stuff -->
		<link rel="apple-touch-icon" href="<?php echo trailingslashit( get_template_directory_uri() ); ?>img/apple-touch-icon.png">
		<link rel="shortcut icon" href="<?php echo trailingslashit( get_template_directory_uri() ); ?>img/favicon.png" type="image/x-icon">

		<!-- modernizr -->
		<script async src="<?php echo trailingslashit( get_template_directory_uri() ); ?>modernizr.js"></script>

		<!-- fontawesome -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<?php wp_head(); ?>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110991380-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-110991380-1');
		</script>

		<!-- End Google Analytics -->
	</head>
	<body <?php body_class(); ?> data-scroll-id="page-top" id="page-top">
		<div class="wrapper-outer">
			<a href="#" class="scroll-top" data-scroll><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
			<div class="wrapper-inner">
				<?php get_template_part( 'partial/header/nav' ); ?>

				<div class="content-wrapper">
					<main role="main">

					</main>