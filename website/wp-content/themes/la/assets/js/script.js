/* Author:

*/

var navHeight = '62px';
var animationDuration = 250;

var collapseNav = function() {
    navHeight = $( 'footer .footer-nav' ).height();
    $( 'footer .footer-nav' ).animate( { 'height': '0' }, function() {
        $( 'footer .nav-arrow' ).toggleClass( 'collapsed', true );
    } );
    $( this ).one( 'click', expandNav );
}

var expandNav = function() {
    $( 'footer .footer-nav' ).animate( { 'height': navHeight + 'px' }, function() {
        $( 'footer .nav-arrow' ).toggleClass( 'collapsed', false );
    } );
    $( this ).one( 'click', collapseNav );
}

var showRedBar = function() {
    $( '.redbar' ).animate( { 'width' : '64px' }, animationDuration );
    $( '.redbar' ).one( 'mouseleave', function() {
        $( '.redbar' ).animate( { 'width' : '16px' }, animationDuration );
    } );
}

$( document ).ready( function() {

    $( '.info' ).hover( showRedBar );
    $( '.info' ).click( showRedBar );

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

    if ( !Modernizr.mq( 'only screen and (max-width: 480px)' ) ) {
       	$( 'footer .social a' ).hover(
    	    function() {
                $( 'footer .social-label' ).html( '<em>(</em>' + $( this ).attr( 'rel' ) + '<em>)</em>' ).fadeIn( 50 );
    	    },
    	    function() {
                $( 'footer .social-label' ).fadeOut( 50 );
    	    }
    	);
    }

	$( 'footer .nav-arrow' ).one( 'click', collapseNav );
} );