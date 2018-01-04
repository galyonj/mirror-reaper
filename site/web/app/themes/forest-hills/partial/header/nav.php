<?php
/**
 * Output the main navbar
 * Author     : John Galyon
 * Author URI : https://galyonj.com
 * Created    : December 9, 2017
 * @version 1.0.0
 * @package WordPress
 * @subpackage forest-hills
 */
?>

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
					     alt="The official site of the <?php echo bloginfo( 'name' ); ?>"
					     title="The official site of the <?php echo bloginfo( 'name'	); ?>">
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
					<li class="visible-xs">
						<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-form"
						      role="search" method="get" id="searchform">
							<div class="form-group">
								<label class="sr-only" for="s"><?php _e( 'Search ' . get_bloginfo( 'name' ), 'forest-hills' ); ?></label>
								<input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search ' . get_bloginfo( 'name' ),'forest-hills'); ?>">
							</div>
						</form>
					</li>
					<li class="hidden-xs">
						<a href="#" title="Search" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-search"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<form class="navbar-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<div class="form-group">
										<label class="sr-only" for="s"><?php _e( 'Search ' . get_bloginfo( 'name' ), 'forest-hills' ); ?></label>
										<input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search ' . get_bloginfo( 'name' ),'forest-hills'); ?>">
									</div>
								</form>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>