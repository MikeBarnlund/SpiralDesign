/* ============================================================================

SD Slideshow jQuery Plugin
===============================

Boilerplate for custom slideshows. Handles image transitions and exposes events

Usage: Execute the plugin on a slideshow container element.

Example:

$( '.selector' ).sdslideshow();

- or -

$( '.selector' ).sdslideshow( { identifier: '.my-check-element-class' } );

Author: Mike Barnlund <mike@spiraldesign.ca>
Date: May 6, 2012

Revisions
=========
May 6, 2012		- Created (mb)

============================================================================ */

(function( $ )
{
	/*
	SDSlideshow Class

	Keeps track of the images of a slideshow and triggers events to caller.
	*/

	var SDSlideshow = function( el, settings ) {

		/* =================== Events ================= */

		var EVENTS = {
			OnTransitionStart: 'onTransitionStart',
			OnTransitionEnd: 'onTransitionEnd'
		};

		/* =================== Private Members ================= */

		var $container;					// jQuery wrapped container element
		var $imageList = null;			// Unordered list element containing images
		var currentImageIndex = null;	// The current slideshow image
		var instance = this;			// lets priveleged functions access the class instance
		var config = {};				// contains object configuration

		/* =================== Helper Methods ================== */

		/*
		Function: 	getConfig
		Visibility: Privileged
		Params: 	None
		Purpose: 	Exposes the configuration (including non-overridden defaults)
		Returns: 	Config object
		*/
		this.getConfig = function() {
			return config;
		}

		/*
		Function: 	getImageList
		Visibility: Privileged
		Params: 	None
		Purpose: 	Exposes the image list array
		Returns: 	Array of image objects
		*/
		this.getImageList = function() {
			return config.imageList;
		}

		/*
		Function: 	getPreviousImageIndex
		Visibility: Privileged
		Params: 	None
		Purpose: 	Gets the previous image index (or the last if we're at the start)
		Returns: 	Index of the image
		*/
		this.getPreviousImageIndex = function() {
			var prevImageIndex = config.imageList.length - 1;
			if ( currentImageIndex !== null && currentImageIndex > 0 ) {
				prevImageIndex = currentImageIndex - 1;
			}
			return prevImageIndex;
		}

		/*
		Function: 	getNextImageIndex
		Visibility: Privileged
		Params: 	None
		Purpose: 	Gets the next image index (or the first if we're at the end)
		Returns: 	Array of image objects
		*/
		this.getNextImageIndex = function() {
			var nextImageIndex = 0;
			if ( currentImageIndex !== null && currentImageIndex < config.imageList.length - 1 ) {
				nextImageIndex = currentImageIndex + 1;
			}
			return nextImageIndex;
		}

		/*
		Function: 	showPreviousImage()
		Visibility: Privileged
		Params: 	None
		Purpose: 	Goes back to the previous image (or the last image if we're at the start)
		Returns: 	Nothing
		*/
		this.showPreviousImage = function() {
			// console.log( 'showNextImage()' );
			swapImageTo( instance.getPreviousImageIndex() );
		}

		/*
		Function: 	showNextImage()
		Visibility: Privileged
		Params: 	None
		Purpose: 	Advances to the next image (or the first image if we're at the end)
		Returns: 	Nothing
		*/
		this.showNextImage = function() {
			// console.log( 'showNextImage()' );
			swapImageTo( instance.getNextImageIndex() );
		}

		/*
		Function: 	swapImageTo()
		Visibility: Private
		Params: 	new Image object to display
		Purpose: 	Animates the switch to the new image
		Returns: 	Nothing
		*/
		var swapImageTo = function( newImageIndex ) {

			var swapped = false;

			// console.log( 'Swapping to image "' + config.imageList[ newImageIndex ].src + '" (' + config.imageList[ newImageIndex ].element + ')' );

			if ( $imageList === null ) {
				$imageList = $( '<ul>' );
				$container.append( $imageList );
			}

			var newImage = config.imageList[ newImageIndex ];

			var oldImage = null;
			if ( currentImageIndex !== null ) oldImage = config.imageList[ currentImageIndex ];

			if ( newImage.element == null ) {

				var img = new Image();
				newImage.element = img;

				var $li = $( '<li>' );
				$imageList.append( $li );
				$li.hide();

				$( img ).load( function() {
					// console.log( 'Loaded: ' + newImage.src );

					$li.append( this );

					if ( animateSwap( oldImage, newImage ) === true ) currentImageIndex = newImageIndex;
					if ( config.autoAdvance === true ) setTimeout( instance.showNextImage, config.transitionDelay );
				} ).error( function( error ) {
					// console.log( 'Error loading image' );
				} ).attr( 'src', newImage.src );

			} else {
				if ( animateSwap( oldImage, newImage ) === true ) currentImageIndex = newImageIndex;
				if ( config.autoAdvance === true ) setTimeout( instance.showNextImage, config.transitionDelay );
			}
		}

		/*
		Function: 	animateSwap()
		Visibility: Private
		Params: 	The old and new images to swap
		Purpose: 	Animates the switch to the new image
		Returns: 	true on successful swap
		*/
		var animateSwap = function( oldImage, newImage ) {

			$container.animate( { 'height': $( newImage.element ).parent().height() + 'px' } );

			switch ( config.transition ) {
				case 'fadeOutIn':
					var delay = config.transitionDuration / 2;
					if ( oldImage === null ) $( newImage.element ).fadeIn( delay );
					else {
						$oldImage = $( oldImage.element );
						$newImage = $( newImage.element );

						$container.animate( { 'height': $newImage.height() + 'px' } );
						$oldImage.fadeOut( delay, function() {
							$( newImage.element ).fadeIn( delay );
						} );
					}
					break;
				case 'fadeOver':
					var delay = config.transitionDuration;
					$( newImage.element ).parent().css( { 'position': 'absolute', 'top': '0', 'left': '0' } );

					// Move the image container in the DOM
					if ( oldImage !== null ) $imageList.append( $( newImage.element ).parent() );

					$( newImage.element ).parent().fadeIn( delay, function() {
						if ( oldImage !== null ) {
							$( oldImage.element ).parent().hide();
						}
					} );

					break;
				case 'slideleft':
				default:
					if ( oldImage !== null ) $( oldImage ).hide();
					$( newImage ).show();
					break;
			}

			return true;
		}

		/* ======================== Event Binding ===================== */

		/*
		Function: 	handleError
		Visibility: Privileged
		Params: 	errorCode: 	The code for this error
					message: 	The error message
		Purpose: 	Anything failing in a try/catch block should call this
		Returns: 	Nothing
		*/
		this.handleError = function( errorCode, exception ) {
			$.jGrowl( 'Error ' + errorCode + ': ' + exception.message + '<br/>Line: ' + exception.lineNumber + '<br/>' + exception.fileName );
		}

		/* ============= Constructor ============== */

		// default configuration
		config = {
			imageList: [],
			transition: 'fadeOver',
			transitionDelay: 5000,
			transitionDuration: 1000,
			start: true,
			autoAdvance: true
		};

		// extend our default configuration with the passed-in settings
		$.extend( config, settings );

		$container = $( el );

		if ( config.start === true ) { instance.showNextImage(); }
	};

	$.fn.sdslideshow = function( settings ) {
		return this.each(function( ) {
			// make sure we haven't already instantiated this
			if ( !$( this ).data( 'instance' ) ) {
				var instance = new SDSlideshow( this, settings );
				$( this ).data( 'instance', instance );
			}
		} );
	};
})(jQuery);