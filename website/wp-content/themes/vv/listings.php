<?php
/*
Template Name: Current Listings
*/

get_header();

?>

<div class="content">
	<div class="listing-types">
		<?php
		$terms = get_terms( 'listingtype' );
		//var_dump( $terms );
		$links = array();
		foreach ( $terms as $term ) {
			$links[] = '<a href="' . get_term_link( $term ) . '" alt="' . $term->name . ' Listings">' . $term->name . '</a>';
		}
		echo implode( $links, ' | ' );
		?>
	</div>
	<div class="section">
		<?php
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