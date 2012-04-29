$dropdowns = null;

$( document ).ready( function() {
	$dropdowns = $( 'ul[dropdown="true"]' )
	$( '.menu .dropdown' ).click( function( e ) {
		$dropdown = $( this ).siblings( 'ul' );
		if ( !$dropdown.is( ':visible' ) ) {
			$dropdowns.hide();
			$dropdown.show();
			$( document ).click( function( e2 ) {
				if ( !$( e2.target ).hasClass( 'dropdown' ) ) {
					$dropdowns.hide();
					$( document ).unbind( 'click' );
				}
			} );
		}
	} );
} );