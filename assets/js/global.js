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
		
	} ); // End doc ready
	
} ) ( jQuery );