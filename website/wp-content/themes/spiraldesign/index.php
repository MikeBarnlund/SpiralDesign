<?php

get_header();

/* Main Loop */

?>

<script>
	$( document ).ready( function() {

		$( '.grid li' ).click( function() {

			ajaxurl = '<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php';
			var $grid = $( 'ul.grid' );

			callback = function( data ) {
				$( '#backside' ).html( data );
				//$grid.toggleClass( 'flip_hide' );
			};

			$( this ).toggleClass( 'full' );

			/* Make this call after you get the animations working
			$.post( ajaxurl,
				{
					action: 'ajax_call',
					post_id: '1'
				},
				callback
			);
			*/
		} );
	} );
</script>

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
<div id="backside"></div>
<?php
while ( have_posts() ) :
	the_post();
	//get_template_part( 'post' );
endwhile;

/* Bottom */
get_footer();