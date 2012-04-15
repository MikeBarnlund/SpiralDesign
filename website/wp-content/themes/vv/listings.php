<?php
/*
Template Name: Current Listings
*/

get_header();

?>

<div class="content">
	<h1 class="entry-title"><span>Industry <em>Leaders</em></span></h1>
	<div class="listings">
		<?php

		/* Main Loop */

		$query = "
			SELECT wposts.*
			FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			WHERE wposts.ID = wpostmeta.post_id
			AND wpostmeta.meta_key = 'state'
			AND wpostmeta.meta_value in ( 'featured', 'active' )
			AND wposts.post_status = 'publish'
			AND wposts.post_type = 'interview'
			ORDER BY wposts.post_date DESC
		";

		$the_posts = $wpdb->get_results( $query, OBJECT );

		foreach ( $the_posts as $post) {
			setup_postdata( $post );
			get_template_part( 'listing', 'slat' );
		}
		?>
	</div> <!-- .interviews -->
</div> <!-- .content -->

<?php

get_footer();

?>