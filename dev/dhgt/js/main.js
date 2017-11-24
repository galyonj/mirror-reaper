// Initialize smooth scrolling functionality
var scroll = new SmoothScroll('a[href*="#"]', {
	// Selectors
	ignore: '[data-scroll-ignore]', // Selector for links to ignore (must be a valid CSS selector)
	header: null, // Selector for fixed headers (must be a valid CSS selector)

	// Speed & Easing
	speed: 666, // Integer. How fast to complete the scroll in milliseconds
	offset: 0, // Integer or Function returning an integer. How far to offset the scrolling anchor location in pixels
	easing: 'easeOutQuint', // Easing pattern to use
	//customEasing: function (time) {}, // Function. Custom easing pattern

	// Callback API
	before: function () {}, // Callback ato run before scroll
	after: function () {} // Callback to run after scroll
});

$( document ).ready( function() {

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

	// Make sure that iframes and embeds are wrapped properly for responsive display
	// collect everything that might contain embedded content
	var allIframes = $( 'iframe[ src*="//player.vimeo.com" ], iframe[ src*="//www.youtube.com" ], iframe[ src*="//www.google.com/maps" ], object, embed' );

	allIframes.each( function() {

		// clean up the iframe element and add a
		// responsive class to key on later for adding wrappers
		$( this ).removeAttr( 'height width' ).addClass( 'embed-responsive-item' );

		// add a wrapper around the iframe
		$( this ).wrap( '<div class="embed-responsive embed-responsive-16by9"></div>' );
	} );
} );

// Make the footer stay at the bottom of the browser
// window on short pages
$( window ).on( 'load resize', function() {

	// sticky footer stuff
	var window_height  = $( window ).height();
	var admin_height   = $( '#wpadminbar' ).height();
	var content_height = $( '.wrapper' ).outerHeight();
	var footer_height  = $( 'footer' ).outerHeight();

	if ( content_height + footer_height < window_height ) {
		if ( $( '#wpadminbar' ).length ) {
			$( '.wrapper' ).css( 'margin-bottom', window_height - ( content_height + footer_height + admin_height ) );
		} else {
			$( '.wrapper' ).css( 'margin-bottom', window_height - ( content_height + footer_height ) );
		}
	}

	// jumbotron size consistency stuff
	// fix the jumbotron aspect ratio for consistent display
	var content_width = $( '.content-wrapper' ).width();
	var row_height    = $( '.jumbotron .row ' ).height();
	var mqxs          = window.matchMedia( 'screen and ( max-width: 767px )' );

	if( mqxs.matches === false ) {
		$( '.jumbotron').css( 'padding-top', content_width * 0.4 - row_height);
	} else {
		$( '.jumbotron' ).css( 'padding-top', content_width * 0.4);
	}
} );