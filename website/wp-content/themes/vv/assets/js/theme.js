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

var sdprint = function( printable_element, css_path ) {
	var printWindow = window.open('', '_blank', 'toolbar=0,status=0');
	var final_html = '<html><head>' +
		'<link media="screen,print" type="text/css" rel="stylesheet" href="' + css_path + '">' +
		'</head><body><div class="entry-content-em single-listing">' +
		$( printable_element ).html() +
		'</div></body></html>';
	printWindow.document.write( final_html );
	printWindow.document.close();
	printWindow.focus();
    printWindow.print();
    printWindow.close();
};