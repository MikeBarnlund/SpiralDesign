<?php
/*
Template Name: Main
*/

get_header();
the_post();
?>

<div class="slideshow container">
	<div class="current-image-container">
		<script>
			var currentHomeImageIndex = 0;
			var newHomeImageIndex = 0;

			$( document ).ready( function() {

				imglist[0] = { src: '<?php bloginfo( 'template_url' ) ?>/assets/img/lc-home-1.jpg', element: $( '.current-image-container img' ).get( 0 ) };
				imglist[1] = { src: '<?php bloginfo( 'template_url' ) ?>/assets/img/lc-home-2.jpg', element: null };
				imglist[2] = { src: '<?php bloginfo( 'template_url' ) ?>/assets/img/lc-home-3.jpg', element: null };

				var nextImage = function() {
					newHomeImageIndex++;
					if ( newHomeImageIndex > 2 ) newHomeImageIndex = 0;
					replaceImage( imglist[ currentHomeImageIndex ], imglist[ newHomeImageIndex ] );
					currentHomeImageIndex = newHomeImageIndex;
				};

				setInterval( nextImage, 6000 );

			} );
		</script>
		<img src="<?php bloginfo( 'template_url' ) ?>/assets/img/lc-home-1.jpg" />
	</div>
</div>

<div class="entry-content thin-bottom">
	<h1 class="header-font">About <em>Love Calgary Real Estate</em></h1>
	<?php the_content(); ?>
</div>

<div class="entry-content-em thin-bottom">
	<h1 class="extra-bottom-margin">Featured <em>Listings</em></h1>
	<?php
	$query = "
		SELECT wposts.*
		FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
		WHERE wposts.ID = wpostmeta.post_id
		AND wpostmeta.meta_key = 'state'
		AND wpostmeta.meta_value = 'featured'
		AND wposts.post_status = 'publish'
		AND wposts.post_type = 'listing'
		ORDER BY wposts.post_date DESC
		LIMIT 3
	";

	$the_posts = $wpdb->get_results( $query, OBJECT );

	foreach ( $the_posts as $post) {
		setup_postdata( $post );
		get_template_part( 'listing', 'slat' );
	}
	?>
</div>

<?php
get_footer();