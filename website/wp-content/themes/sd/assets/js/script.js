$( document ).ready( function() {
    
    // ============================== Sharing =================================
	
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
	
	// ============================== Menu =================================
	
    $( 'li.has-sub-menu').click( function() {
        $submenu = $( this ).children( 'ul.sub-menu' );
        
        if ( !$submenu.is( ':visible' ) ) {
            $submenu.fadeIn( 75, function() {
                $( document ).one( 'click', function() {
                    $submenu.fadeOut( 100 );
                } );
            } );
        } else 
            $submenu.fadeOut( 100 );

        // don't follow the link
        return false;
    } );
} );