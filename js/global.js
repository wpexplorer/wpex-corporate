( function($) {
	"use strict";
	
	$( document ).ready(function() {
		
		// Main menu superfish
		$( 'ul.sf-menu' ).superfish( {
			delay		: 200,
			animation	: {
				opacity	:'show',
				height	:'show'
			},
			speed		: 'fast',
			cssArrows	: false,
			disableHI	: true
		} );
		
		// Mobile Menu
		$( '#navigation-toggle' ).sidr( {
			name	: 'sidr-main',
			source	: '#sidr-close, #site-navigation',
			side	: 'left'
		} );

		$( '.sidr-class-toggle-sidr-close' ).click( function() {
			$.sidr( 'close', 'sidr-main' );
			return false;
		} );
		
		// Lightbox
		$( '.wpex-lightbox' ).magnificPopup( {
			type	: 'image'
		} );

		$( '.wpex-lightbox-gallery' ).each( function() {
			$(this).magnificPopup( {
				delegate	: 'a.wpex-lightbox-item',
				type		: 'image',
				gallery		: {
					enabled: true
				}
			} );
		} );
		
	} ); // End doc ready

	$( window ).load( function() {

		// Homepage FlexSlider
		$( '#homepage-slider' ).flexslider( {
			animation			: 'fade',
			slideshow			: true,
			smoothHeight		: true,
			controlNav			: false,
			directionNav		: true,
			prevText			: '<span class="fa fa-caret-left"></span>',
			nextText			: '<span class="fa fa-caret-right"></span>',
			controlsContainer	: ".flexslider-container"
		} );

		// Post FlexSlider
		$('div.post-slider').flexslider( {
			animation			: 'fade',
			slideshow			: true,
			smoothHeight		: true,
			controlNav			: false,
			directionNav		: true,
			prevText			: '<span class="fa fa-caret-left"></span>',
			nextText			: '<span class="fa fa-caret-right"></span>',
			controlsContainer	: ".flexslider-container"
		} );
		
	} ); // End on window load
	
} ) ( jQuery );