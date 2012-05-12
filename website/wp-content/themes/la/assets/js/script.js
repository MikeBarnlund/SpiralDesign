/* Author:

*/

$( document ).ready( function() {
    $( 'nav a.categories' ).click( function() {
        if ( !$( '.cat-dropdown' ).is( ':visible' ) ) {
            $( '.cat-dropdown' ).fadeIn( 75, function() {
                $( document ).one( 'click', function() {
                    $( '.cat-dropdown' ).fadeOut( 100 );
                } );
            } );
        }
    } );

	$( document ).ready( function() {
		$( '.post-footer a.twitter' ).click( function() {
			var url = $( this ).attr( 'href' );
			window.open( url, "Tweet", "height=246,width=780,resizable=1" );
			return false;
		} );
		$( '.post-footer a.facebook' ).click( function() {
			var url = $( this ).attr( 'href' );
			window.open( url, "Share on Facebook", "height=267,width=640,resizable=1" );
			return false;
		} );
	} );

} );