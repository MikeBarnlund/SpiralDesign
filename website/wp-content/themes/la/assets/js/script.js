/* Author:

*/

var animationDuration = 250;

var showRedBar = function() {
    $( '.redbar' ).animate( { 'width' : '53px' }, animationDuration );
    $( '.redbar' ).one( 'click', hideRedBar );
}

var hideRedBar = function() {
    $( '.redbar' ).animate( { 'width' : '0px' }, animationDuration );
}

$( document ).ready( function() {

    $( '.info' ).hover( showRedBar );
    $( '.info' ).click( showRedBar );

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
} );