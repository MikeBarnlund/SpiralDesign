$( document ).ready( function() {
	$( 'a#tweet_button' ).click( function() {
		var url = $( this ).attr( 'href' );
		window.open( url, "tweet", "height=246,width=780,resizable=1" )
		return false;
	} );
	$( 'a#fb_button' ).click( function() {
		var url = $( this ).attr( 'href' );
		window.open( url, "tweet", "height=267,width=640,resizable=1" )
		return false;
	} );
} );