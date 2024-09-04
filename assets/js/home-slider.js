( function( $ ) {
	'use strict';

	$( window ).load( function() {

		$( '#homepage-slider' ).flexslider( {
			animation			: 'fade',
			slideshow			: true,
			smoothHeight		: true,
			controlNav			: false,
			directionNav		: true,
			prevText			: '<span class="fa fa-caret-left" aria-hidden="true"></span>',
			nextText			: '<span class="fa fa-caret-right" aria-hidden="true"></span>',
			controlsContainer	: ".flexslider-container"
		} );
		
	} );
	
} ) ( jQuery );