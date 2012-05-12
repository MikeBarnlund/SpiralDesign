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
    } )
} );