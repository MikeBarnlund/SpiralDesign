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
	
    $( 'li.has-sub-menu a').click( function() {
        $submenu = $( this ).siblings( 'ul.sub-menu' );
        
        if ( !$submenu.is( ':visible' ) ) {
            $( 'ul.sub-menu:visible' ).fadeOut( 100 );
            $submenu.fadeIn( 75, function() {
                $( document ).one( 'click', function() {
                    $submenu.fadeOut( 100 );
                } );
            } );
        } else 
            $submenu.fadeOut( 100 );

        // don't follow the link if it's '#'
        if ( $( this ).attr( 'href' ) == '#' ) return false;
    } );
    
    // ============================ Events ===================================
    
    $( '.events li' ).click( function() {
        var newhtml = $( this ).html();
        $( '.main-event' )
            .animate( { 'opacity': 0.01 }, 250, function() {
                $( this ).html( newhtml );
            } )
            .animate( { 'opacity': 1 }, 250 );
    } );
} );