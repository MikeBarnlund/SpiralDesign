<?php

get_header();

/* Main Loop */

?>

<script>
	doflip = function( element, flipClass ) {
		element.toggleClass( flipClass );
	};
	$( document ).ready( function() {

		$( '.grid li' ).click( function() {
			var i = 0;
			var $asyncContainer = $( '#async-container' );
			var $grid = $( this ).parent( 'ul.grid' );
			$( '.grid li' ).each( function() {
				var flipClass = ( i % 2 === 0 ) ? 'flipped-horizontal' : 'flipped-vertical';
				var $this = $( this );
				var flipto = setTimeout(
					function() {
						doflip( $this, flipClass );
					},
					i * 50 );
				i++;
			} );

			// slide the grid left
			setTimeout( function() {
				$grid.hide();
				$asyncContainer.toggleClass( 'slideleft', true );
			}, i * 50 + 450 );

			ajaxurl = '<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php';

			callback = function( data ) {
				var $asyncContainer = $( '#async-container' );
				$asyncContainer.html( data );
			};

			$.post( ajaxurl,
				{
					action: 'ajax_call',
					post_id: '1'
				},
				callback
			);
		} );

	} );
</script>

<div id="viewport">
	<ul class="grid">
		<li class="dbl"><span>Web design has evolved. <em>Has it passed you by?</em></span></li>
		<li class="nav"><span>Do I <em>really</em> need a mobile site?</span></li>
		<li class="work"><img src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/ss_plumbing_paramedics.png"><span>Work<small>plumbingparamedics.ca</small></span></li>
		<li class="nav"><span>Contact</span></li>
		<li class="post_link"><span>Mobile First</span></li>

		<li class="work"><img src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/ss_joebeeverz.png"><span>Work<small>joebeeverz.com</small></span></li>
		<li class="post_link"><span>Sass Kick Sass</span></li>
		<li class="nav"><span>About Spiral Design</span></li>

		<li class="work"><img src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/ss_remotegc.png"><span>Work<small>remotegc.com</small></span></li>
	</ul>
	<div id="async-container">

	</div>
</div>
<?php
while ( have_posts() ) :
	the_post();
	//get_template_part( 'post' );
endwhile;

/* Bottom */
get_footer();