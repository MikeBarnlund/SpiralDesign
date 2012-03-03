<?php
if ( is_single() ) {

}
elseif ( is_home() || is_front_page() ) {

}
elseif ( is_page() ) {

}
elseif ( is_search() ) {

}
elseif ( is_404() ) {

}
?>

<script>
	doflip = function( element, hide ) {
		if ( hide === true ) {
			element.removeClass( 'off' ).addClass( 'on' );
		} else {
			element.removeClass( 'on' ).addClass( 'off' );
		}
	};

	$( document ).ready( function() {
		$( '#async-content' ).not( '.off-screen' ).css( { 'height' : '0' } );

		$( '.grid li a' ).click( function( e ) {
			e.preventDefault();
			var $this = $( this );
			var i = 0;
			var $viewport = $( this ).parents( 'div#viewport' );
			var $grid = $( this ).parents( 'ul.grid' );
			var href = $this.attr( 'href' );
			$( '.grid li' ).each( function() {
				var $this = $( this );
				var flipto = setTimeout(
					function() {
						doflip( $this, true );
					},
					i * 50 );
				i++;
			} );

			// slide the grid left
			setTimeout( function() {
				$viewport.addClass( 'slideleft', true );
			}, i * 50 + 450 );

			ajaxurl = '<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php';

			callback = function( data ) {
				var $asyncContent = $( '#async-content' );
				$asyncContent.html( data ).animateHeight( 1000 );
				//$.address.value( href );
			};

			$.post( ajaxurl,
				{
					action: 'ajax_call',
					post_id: $this.attr( 'rel' )
				},
				callback
			);

			return false;
		} );

		$( '#home-button' ).click( function( e ) {
			e.preventDefault();
			var contentSlideSpeed = 500;
			var $viewport = $( this ).parents( 'div#viewport' );
			var $asyncContent = $( '#async-content' );

			// slide the menu back into view
			$viewport.removeClass( 'slideleft', true );

			// wait for animation then clear async content
			setTimeout( function() {
				$asyncContent.animate( { 'height': 0 } );
			}, contentSlideSpeed );

			var i = 0;
			$( '.grid li' ).each( function() {
				var $this = $( this );
				var flipto = setTimeout(
					function() {
						doflip( $this, false );
					},
					i * 50 + contentSlideSpeed );
				i++;
			} );

			return false;
		} );

	} );

	$.address.change(function(event) {
	    // do something depending on the event.value property, e.g.
	    // $('#content').load(event.value + '.xml');
		console.log( 'address.change called' );
	});

</script>

<?php
global $grid_on_screen;
$grid_on_screen = ( is_home() || is_front_page() ) ? TRUE : FALSE;
?>

<div id="viewport" <?php echo ( !$grid_on_screen ) ? 'class="slideleft"' : ''; ?>>
	<div id="navgrid">
		<ul class="grid">
			<?php
			$args = array(
				'posts_per_page' => 10,
	            'order' => 'DESC',
	            'meta_key' => '_gridpriority',
	            'orderby' => 'meta_value_num', //or 'meta_value'
				'meta_query' => array(
					array(
						'key' => '_gridpriority',
						'compare' => '>=',
						'value' => '1',
						'type' => 'numeric'
					)
				)
			);

			query_posts( $args );

			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;
			?>
		</ul>
	</div>
	<div id="async-container">
		<div id="nav-menu">
			<a id="home-button" href="/">Home</a>
		</div>
		<div id="async-content"<?php echo ( !$grid_on_screen ) ? ' class="off-screen"' : ''; ?>>
			<?php the_post(); ?>
				<?php get_template_part( 'post' ); ?>

		</div>
	</div>
</div>