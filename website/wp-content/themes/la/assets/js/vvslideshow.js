var currentImage = null;

var imglist = [];

function replaceImage( oldImage, newImage ) {

	/*
	Notes
	- use some closures here, have a function with image elements ready to rock on timers
	- you can create the image variables early and bind the load event, without actually
		calling .attr() and loading the image (thoguh you may not want to)
	*/

	if ( newImage.element == null ) {

		var img = new Image();
		newImage.element = img;

		$( img ).load( function() {
			$( this ).hide();

			$( '.slideshow ul' ).append( $( 'li' ).append( this ) );

			doSwap( oldImage, newImage );

		}).error(function( error ) {
			//console.log ( 'Huh?' );
		}).attr( 'src', newImage.src );

	} else {
		doSwap( oldImage, newImage );
	}

	currentImage = newImage;
}

function doSwap ( oldImage, newImage ) {
	var delay = 250;
	if ( oldImage == null ) $( newImage.element ).fadeIn( delay );
	else {
		$oldImage = $( oldImage.element );
		$newImage = $( newImage.element );
		$imageContainer = $oldImage.parent();

		$imageContainer.animate( { 'height': $newImage.height() + 'px' } );
		$oldImage.fadeOut( delay, function() {
			$( newImage.element ).fadeIn( delay );
		} );
	}
}

function jumpTo ( imageIndex ) {
	replaceImage( currentImage, imglist[ imageIndex ] );
}