<?php

/**
 * Change the login logo, header url,
 * and header title on the site login page.
 */
function login_logo() { ?>
	<!--suppress JSJQueryEfficiency -->
	<style type="text/css">
		#login h1 a, .login h1 a {
			background: url(<?php echo trailingslashit( get_stylesheet_directory_uri() ); ?>img/logo.svg) no-repeat center center;
			background-size: contain;
			padding: 0 0 50px 0;
			width: 100%;
		}
		#backtoblog {
			display: none;
		}
		#nav {
			text-align: center;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'login_logo' );

// link the logo to the front page of the website
// to which the user is logging in
function login_url() {
	return get_bloginfo( 'url' );
}
add_filter('login_headerurl', 'login_url');

// set the blog name as title
// text for the login image
function change_login_logo_title() {
	return get_bloginfo('name');
}
add_filter('login_headertitle', 'change_login_logo_title');

// Add custom message to WordPress login page

function alter_login_message( $message ) {
	if ( empty($message) ){
		return '<p style="text-align: center;">This tool is intended for authorized users only. Your IP address will be recorded on form submission.</strong></p>';
	} else {
		return $message;
	}
}
add_filter( 'login_message', 'alter_login_message' );