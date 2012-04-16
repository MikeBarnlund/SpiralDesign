<?php
/*
Template Name: Current Listings
*/

get_header();

?>

<div class="content">
	<?php get_template_part( 'listingtypes' ); ?>
	<?php get_search_form(); ?>
	<div class="section">
		<?php
		$term = NULL;
		$query = "
			SELECT wposts.*
			FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			WHERE wposts.ID = wpostmeta.post_id
			AND wpostmeta.meta_key = 'state'
			AND wpostmeta.meta_value in ( 'featured', 'active' )
			AND wposts.post_status = 'publish'
			AND wposts.post_type = 'listing'
			ORDER BY wposts.post_date DESC
		";

		$the_posts = $wpdb->get_results( $query, OBJECT );

		foreach ( $the_posts as $post) {
			setup_postdata( $post );
			get_template_part( 'listing', 'slat' );
		}
		?>
	</div>
</div> <!-- .content -->

<?php

get_footer();

?>