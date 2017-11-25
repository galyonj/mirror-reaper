<?php
/**
 * Header template
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : May 23, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage dhgt
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
	<!--<script async src="<?php echo trailingslashit( get_template_directory_uri() ); ?>modernizr.js"></script>-->

	<!-- fontawesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<?php wp_head(); ?>

	<!-- Google Analytics -->
	<script>
		window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
		ga('create', 'UA-XXXXX-Y', 'auto');
		ga('send', 'pageview');
	</script>
	<script async src='https://www.google-analytics.com/analytics.js'></script>
	<!-- End Google Analytics -->
</head>
<body <?php body_class(); ?> data-scroll-id="page-top" id="page-top">
<div class="wrapper">
	<a href="#" data-scroll class="scroll-top">
		<i class="fa fa-chevron-up"></i>
		<span class="sr-only">scroll to top of page</span>
	</a>
	<header role="banner">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" class="navbar-toggle collapsed">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="sr-only">toggle navigation menu</span>
					</button>
					<a href="<?php echo home_url(); ?>" class="navbar-brand">
						<img src="<?php echo trailingslashit( get_template_directory_uri() ); ?>img/logo.svg"
						     alt="<?php echo bloginfo( 'name' ); ?>" title="<?php echo bloginfo( 'name' ); ?>">
					</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav">
						<?php
						$defaults = array(
							'theme_location'  => 'main-nav',
							'menu'            => 'main-nav',
							'container'       => false,
							'menu_class'      => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'depth'           => 0,
							'items_wrap'      => '%3$s'
						);

						wp_nav_menu( $defaults );
						?>
						<li>
							<form action="<?php echo home_url( '/' ); ?>" class="navbar-form" role="search" method="get" id="searchform">
								<div class="input-group">
									<input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search',''); ?>">
									<span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </span>
								</div>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="content-wrapper">