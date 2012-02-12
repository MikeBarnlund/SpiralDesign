<?php

get_header();

/* Main Loop */

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
		$( '#async-content' ).css( { 'height' : '0' } );

		$( '.grid li a' ).click( function( e ) {
			e.preventDefault();
			var $this = $( this );
			var i = 0;
			var $viewport = $( this ).parents( 'div#viewport' );
			var $grid = $( this ).parents( 'ul.grid' );
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
</script>

<div id="viewport">
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
			<li class="work anim-fade"><img src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/ss_plumbing_paramedics.png"><span>Work<small>plumbingparamedics.ca</small></span></li>

			<li class="work anim-hflip"><img src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/ss_joebeeverz.png"><span>Work<small>joebeeverz.com</small></span></li>

			<li class="work anim-hflip"><img src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/ss_remotegc.png"><span>Work<small>remotegc.com</small></span></li>
		</ul>
	</div>
	<div id="async-container">
		<div id="nav-menu">
			<a id="home-button" href="/">Home</a>
		</div>
		<div id="async-content"></div>
	</div>
</div>
<?php
while ( have_posts() ) :
	the_post();
	//get_template_part( 'post' );
endwhile;

/* Bottom */
get_footer();