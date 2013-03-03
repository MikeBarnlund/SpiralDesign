$( function() {
    // Backbone Stuff =========================================================
    
	Post = Backbone.Model.extend( {
		initialize: function() {
			console.log( 'Hello World!' );
			
			this.bind('change:type', function() {
                console.log( this.get( 'type' ) + ' is the new type.' );
			} );
			
			this.bind( 'error', function( model, error ) {
                console.log( error );
			} );
		},
		defaults: {
			type: 'generic'
		},
		validate: function( attributes ) {
		    if ( attributes.type != 'generic' ) {
		        return 'Invalid post type';
		    }
		}
	} );

	var post = new Post();
	post.set( { type: 'special' } );
	
	var View = Backbone.View.extend( {
        initialize: function() {
            this.template = $( '#list-template' ).children();
        },
        el: '#container',
        events: {
            'click button': 'render' // contextual selector!!!
        },
        render: function() {
            var data = this.model.get( 'type' );
            var li = this.template.clone().html( data );
            this.$el.find( 'ul' ).append( li );
        }
	} );
	
	var view = new View( { model: post } );
	
	var Router = Backbone.Router.extend( {
        routes: {
            '*action': 'wpfetch',
            'foo/:bar': 'paramtest'
        },
        wpfetch: function( slug ) {
            ajaxGetPost( slug );
        },
        paramtest: function( p ) {
            console.log( p );
        }
	} );
	
	// Routing Stuff ==========================================================
	
	// Declare the rootUrl used for filtering internal links. Intercepted links must be absolute
    var rootUrl = document.location.protocol + '//' + (document.location.hostname || document.location.host) + (document.location.port ? ':' + document.location.port : '') + '/';
	
	var router = new Router();
	
	Backbone.history.start( { pushState: true } );
	
	// Grab internal links and pass control to our Backbone router
    $( document ).on( "click", "a[href^='" + rootUrl + "']", function( event ) {
        event.preventDefault();
        if ( !event.altKey && !event.ctrlKey && !event.metaKey && !event.shiftKey ) {
            event.preventDefault();
            var url = $( event.currentTarget ).attr( "href" ).replace( rootUrl, "" );
            router.navigate( url, { trigger: true } );
        }
    });
} );

function ajaxGetPost( slug ){
    // here is where the request will happen
    $.getJSON( '/wp-admin/admin-ajax.php', {
        'action': 'do_ajax',
        'fn': 'get_post_by_slug',
        'slug': slug
    } )
    .success( function( data ) { 
        alert( data.length );
    } )
    .error( function( errorThrown ) {
        alert( 'error' );
        console.log( errorThrown );
    } )
    .complete( function() { } );
}