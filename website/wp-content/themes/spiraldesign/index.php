<?php

get_header();

/* Main Loop */

?>

<script>
	$( document ).ready( function() {
		$( '.grid li' ).click( function() {
			$( this ).parent().toggleClass( 'flip_hide' );
		} );

		$( '#testajax' ).click( function() {
			ajaxurl = '<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php';
			console.log( ajaxurl );
			$.post( ajaxurl,
				{
					action: 'ajax_call',
					post_id: '1'
				},
				function( data ) {
					console.log( 'Data = ' + data );
				}
			);
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

<button id="testajax">Test Ajax</button>

<?php
while ( have_posts() ) :
	the_post();
	//get_template_part( 'post' );
endwhile;

/* Bottom */
get_footer();