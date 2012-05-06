/* Author:

*/

$( document ).ready( function() {
	$( 'header .nav-button' ).click( function() {
		if ( $( 'nav' ).css( 'height' ) !== '0px' ) {
			if ( Modernizr.csstransitions ) {
				$( 'nav' ).css( { 'height': 0 } );
			} else {	// use jQuery animation if no native CSS transitions are allowed
				( 'nav' ).animate( { 'height': 0 } );
				alert( 'jQuery' );
			}
		} else {
			var navheight = $( 'nav ul' ).css( 'height' );
			if ( Modernizr.csstransitions ) {
				$( 'nav' ).css( { 'height': navheight } );
			} else {	// use jQuery animation if no native CSS transitions are allowed
				( 'nav' ).animate( { 'height': navheight } );
				alert( 'jQuery' );
			}
		}
	} );
} );