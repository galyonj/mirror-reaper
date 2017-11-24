var scroll = new SmoothScroll('a[href*="#"]', {
	// Selectors
	ignore: '[data-scroll-ignore]', // Selector for links to ignore (must be a valid CSS selector)
	header: null, // Selector for fixed headers (must be a valid CSS selector)

	// Speed & Easing
	speed: 666, // Integer. How fast to complete the scroll in milliseconds
	offset: 0, // Integer or Function returning an integer. How far to offset the scrolling anchor location in pixels
	easing: 'easeInOutCubic', // Easing pattern to use
	//customEasing: function (time) {}, // Function. Custom easing pattern

	// Callback API
	before: function () {}, // Callback to run before scroll
	after: function () {} // Callback to run after scroll
});

$( document ).ready( function() {

	//$( 'article p a:not( [ href*="galyonj" ] ):not( [href^="#"] )' ).attr( 'rel', 'nofollow' ).append( '<sup><i class="fa fa-external-link" aria-hidden="true"></i></sup>' );

	$( 'article img' ).not( '.img-responsive' ).addClass( 'img-responsive' );

	$( 'figure/*, .instagram-media*/' ).removeAttr( 'style' );

	$( '.malinky-ajax-pagination-loading img' ).replaceWith( '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>' );

	$( '.nav-next' ).addClass( 'pull-right' );

	// fade in/out for scroll to top button
	$( '.scroll-top' ).hide();

	$( window ).scroll( function() {
		if( $( this ).scrollTop() > 100 ) {
			// if the window's position is greater than 100 pixels away from the top
			// of the page, fade the scroll button in
			$( '.scroll-top' ).fadeIn( 'slow' );
		} else {
			// if not, fade the button so it's out of the way
			$( '.scroll-top' ).fadeOut( 'slow' );
		}
	} );
} );

// This function pushes the footer down
// on pages that have short content
$( window ).on( 'load resize', function sticky_footer() {

	// sticky footer stuff
	var window_height = $( window ).height();
	var adminbar_height = $( '#wpadminbar' ).height();
	var content_height = $( '.wrapper' ).outerHeight();
	var footer_height = $( 'footer' ).outerHeight();

	if (content_height + footer_height < window_height) {
		if ($('#wpadminbar').length) {
			$('.wrapper').css('margin-bottom', window_height - ( content_height + footer_height + adminbar_height ));
		} else {
			$('.wrapper').css('margin-bottom', window_height - ( content_height + footer_height ));
		}
	}
} );

// Resize the masthead so that it better keeps the aspect ratio
// of the original background image regardless of screen width.
$( window ).on( 'resize', function mastheadSize() {

	var width  = $( '.jumbotron' ).width();
	var height = $( '.jumbotron .row' ).height();
	//var mqxs   = window.matchMedia( 'screen and ( max-width: 767px )' );

	$( '.jumbotron .row' ).css( 'padding-top', width * 0.45 - height );

} ).trigger( 'resize' );