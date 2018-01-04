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

$( document ).ready( function()  {

	// fade in/out for scroll to top button
	$('.scroll-top').hide();

	$( window ).scroll( function () {
		var s = $( this ).scrollTop();

		if ( s > 200) {
			// if the window's position is greater than 200 pixels away from the top
			// of the page, fade the scroll button in
			$( '.scroll-top' ).fadeIn();
		} else {
			// if not, fade the button so it's out of the way
			$( '.scroll-top' ).fadeOut();
		}
	} );

	// set focus to the search bar when it's been exposed
	// at sizes larger than 767px.
	$( '.dropdown' ).on( 'shown.bs.dropdown', function( event ) {
		var dropdown = $( event.target );

		setTimeout(function() {
			dropdown.find( '.dropdown-menu li .navbar-form .form-group #s.search-query.form-control' ).focus();
		}, 50 );
	} );
} );

// This function pushes the footer down
// on pages that have short content
$( window ).on( 'load resize', function sticky_footer() {

	// sticky footer stuff
	var window_height = $( window ).height();
	var adminbar_height = $( '#wpadminbar' ).height();
	var content_height = $( '.wrapper-inner' ).outerHeight();
	var footer_height = $( 'footer' ).outerHeight();

	if (content_height + footer_height < window_height) {
		if ($('#wpadminbar').length) {
			$('.wrapper-inner').css('margin-bottom', window_height - ( content_height + footer_height + adminbar_height ));
		} else {
			$('.wrapper-inner').css('margin-bottom', window_height - ( content_height + footer_height ));
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