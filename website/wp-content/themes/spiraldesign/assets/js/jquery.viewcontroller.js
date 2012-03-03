/* ============================================================================

ViewController Javascript jQuery Plugin
=======================================

This plugin is used for managing the view state of an AJAX web app. Note that
any AJAX deep-linking will need backend support.

Author: Mike Barnlund <mike@spiraldesign.ca>
Date: Feb 19, 2012

Revisions
=========
Feb 19, 2012		- Created (mb)

============================================================================ */


(function($)
{
	/*
	View Class

	Each instance of the View class represents a "page" from the backend. Don't
	ever destroy these, load cached Views whenever possible.

	*/

	var View = function( el, settings ) {

		/* =================== Constants =================== */

		var STATUS = {
			VISIBLE	  		: 1,
			HIDDEN		  	: 2,
			UPDATING		: 3,
			TRANSITION		: 4,
		  	ERROR			: -1
		};

		var EVENTS = {
			UpdateStart			: 'updateStart',
			UpdateComplete		: 'updateComplete'
		};

		/* =================== Private Members ================= */

		var instance = this;			// lets priveleged functions access the class instance
		var config = {};				// contains object configuration
		var $widget;					// jQuery object containing element
		var status;						// View status (enum)

		/* =================== Helper Methods =================== */

		/*
		Function: 	getConfig
		Visibility: Privileged
		Params: 	None
		Purpose: 	Exposes the passed-in CHUploader configuration
		Returns: 	Config object
		*/
		this.getConfig = function() {
			return config;
		}

		/* ======================== Event Binding ===================== */

		/*
		Function: 	uploadCancelled
		Visibility: Privileged
		Params: 	event: 		jQuery Event Object
		 			file: 		SWFUpload File Object
		Purpose: 	Should be bound to the SWFUpload uploadCancelled event, but SWFUpload doesn't have that (yet). We instead call it manually on
					upload error code -280, which is the error thrown when a file is cancelled. In this function we update the class of the
					progress bar to indicate cancellation and then add a message.
		Returns: 	Nothing
		*/
		this.uploadCancelled = function( event, file ) {
			files[file.id].status = STATUS.CANCELLED;
			files[file.id].$progressBar.find( '.progress' ).toggleClass( 'cancelled', true );
			$fileRow.find( 'a[rel="cancelFileUpload"]' ).replaceWith( txt_replacement.js_cancelled );
		}

		/*
		Function: 	handleError
		Visibility: Privileged
		Params: 	event: 		jQuery Event Object
		 			file: 		SWFUpload File Object
					errorCode: 	The code for this error
					message: 	The error message
		Purpose: 	Should be bound to any SWFUpload error event. Updates the file's row with the error message
					and cleans up the row of anything we don't need anymore.
		Returns: 	Nothing
		*/
		this.handleError = function( event, file, errorCode, message ) {
			files[file.id].status = STATUS.ERROR;

			if ( errorCode == SWFUpload.UPLOAD_ERROR.FILE_CANCELLED ) {
				files[file.id].status = STATUS.CANCELLED;
				instance.uploadCancelled( event, file );
				return;
			}

			var $fileRow = files[file.id].$fileRow;

			// Remove the cells from this row (except the first one)
			var notFileNameTds = $fileRow.children().not( '.filename' );
			notFileNameTds.remove();

			// Expand the filename cell, populate with error message
			$fileRow.children( '.filename' ).attr( 'colspan', 3 ).html( 'Error: ' + message );
		}
	}

	/*
	ViewController Class

	Manages the Views

	*/

	var ViewController = function( el, settings ) {

		/* =================== Constants =================== */

		var STATUS = {

		};

		var EVENTS = {

		};

		/* =================== Private Members ================= */

		var instance = this;			// lets priveleged functions access the class instance
		var config = {};				// contains object configuration
		var views = {};					// view registry
		var $widget;					// jQuery object containing table element

		/* =================== Helper Methods =================== */

		/*
		Function: 	getConfig
		Visibility: Privileged
		Params: 	None
		Purpose: 	Exposes the passed-in CHUploader configuration
		Returns: 	Config object
		*/
		this.getConfig = function() {
			return config;
		}

		/* ======================== Event Binding ===================== */

		/*
		Function: 	uploadCancelled
		Visibility: Privileged
		Params: 	event: 		jQuery Event Object
		 			file: 		SWFUpload File Object
		Purpose: 	Should be bound to the SWFUpload uploadCancelled event, but SWFUpload doesn't have that (yet). We instead call it manually on
					upload error code -280, which is the error thrown when a file is cancelled. In this function we update the class of the
					progress bar to indicate cancellation and then add a message.
		Returns: 	Nothing
		*/
		this.uploadCancelled = function( event, file ) {
			files[file.id].status = STATUS.CANCELLED;
			files[file.id].$progressBar.find( '.progress' ).toggleClass( 'cancelled', true );
			$fileRow.find( 'a[rel="cancelFileUpload"]' ).replaceWith( txt_replacement.js_cancelled );
		}

		/*
		Function: 	handleError
		Visibility: Privileged
		Params: 	event: 		jQuery Event Object
		 			file: 		SWFUpload File Object
					errorCode: 	The code for this error
					message: 	The error message
		Purpose: 	Should be bound to any SWFUpload error event. Updates the file's row with the error message
					and cleans up the row of anything we don't need anymore.
		Returns: 	Nothing
		*/
		this.handleError = function( event, file, errorCode, message ) {
			files[file.id].status = STATUS.ERROR;

			if ( errorCode == SWFUpload.UPLOAD_ERROR.FILE_CANCELLED ) {
				files[file.id].status = STATUS.CANCELLED;
				instance.uploadCancelled( event, file );
				return;
			}

			var $fileRow = files[file.id].$fileRow;

			// Remove the cells from this row (except the first one)
			var notFileNameTds = $fileRow.children().not( '.filename' );
			notFileNameTds.remove();

			// Expand the filename cell, populate with error message
			$fileRow.children( '.filename' ).attr( 'colspan', 3 ).html( 'Error: ' + message );
		}

		/* =================== SWFUpload Initialization ==================== */

		/*
		Function: 	enableAttachFile
		Visibility: Private
		Params: 	None
		Purpose: 	This function manages the enabling/disabling of the "Attach File" row of the widget, as
					well as the corresponding flash runtime, SWFUpload. We don't load SWFUpload until we need
					it since it's heavy, and we also can't bind SWFUpload easily to an element that doesn't
					exist in the DOM. Therefore we don't load it until it's enabled.
		Returns: 	Nothing
		*/
		var enableAttachFile = function() {

		}

		/* =================== Constructor ==================== */

		$widget = $( el );

		// default configuration
		config = {
			file_post_name: 'file',
			attachFileClassName : 'attachFiles',
			attachFileText : 'Attach File',
			use_query_string: true,
			file_size_limit : "10240000",
			file_types : "*.*",
			file_types_description : "All Files",
			file_upload_limit : "0",
			button_image_url : null,
			button_window_mode : SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_action : SWFUpload.BUTTON_ACTION.SELECT_FILE,
			button_cursor: SWFUpload.CURSOR.HAND,
			debug : false,
			max_files: 3,
			existing_files: []
		};

		// extend our default configuration with the passed-in settings
		$.extend( config, settings );

	}

	$.fn.viewController = function( ) {

		var args = $.makeArray(arguments);

		return this.each(function( ) {
			// make sure we haven't already instantiated this
			if ( !$( this ).data( 'instance' ) ) {
				var instance = new ViewController( this, args[0] );

				$( this ).data( 'instance', instance );
			}
		} );
	};

	/* ======================= Plugin Functions ======================== */
	$.viewController = {
		/*
		Function: 	isTransitioning
		Visibility: Public (Namespaced)
		Params: 	None
		Purpose: 	Determine if the view controller is "between views"
		Returns: 	Boolean
		*/
		isTransitioning: function() {
			return false;
		}
	};

})(jQuery);
