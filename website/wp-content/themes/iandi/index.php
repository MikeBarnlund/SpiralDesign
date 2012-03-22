<?php
/*
Template Name: Main
*/

get_header(); ?>

<div class="content">

	<div class="section">
		<h1><span>Industry <em>Leaders</em></span></h1>
		<?php
		$query = "
			SELECT wposts.*
			FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			WHERE wposts.ID = wpostmeta.post_id
			AND wpostmeta.meta_key = 'state'
			AND wpostmeta.meta_value = 'featured'
			AND wposts.post_status = 'publish'
			AND wposts.post_type = 'interview'
			ORDER BY wposts.post_date DESC
			LIMIT 1
		";

		$the_posts = $wpdb->get_results( $query, OBJECT );

		foreach ( $the_posts as $post) {
			setup_postdata( $post );
			get_template_part( 'interview', 'header' );
		}
		?>
	</div>

	<div class="section spacer">
		<h1 class="upcoming-interviews"><span>Upcoming Interviews</span></h1>
		<?php
		$query = "
			SELECT wposts.*
			FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			WHERE wposts.ID = wpostmeta.post_id
			AND wpostmeta.meta_key = 'state'
			AND wpostmeta.meta_value = 'upcoming'
			AND wposts.post_status = 'publish'
			AND wposts.post_type = 'interview'
			ORDER BY wposts.post_date DESC
			LIMIT 3
		";

		$the_posts = $wpdb->get_results( $query, OBJECT );

		foreach ( $the_posts as $post) {
			setup_postdata( $post );
			get_template_part( 'interview', 'upcoming' );
		}
		?>
		<a class="previous-interviews" href="/interviews">Previous Interviews&nbsp;&nbsp;<em>>></em></a>
	</div>

	<div class="section">
		<h1><span><em>Things of</em> Interest</span></h1>
		<?php

		$the_posts = query_posts( 'posts_per_page=2' );
		//$the_posts = get_posts( );

		foreach ( $the_posts as $post) {
			setup_postdata( $post );
			get_template_part( 'content', get_post_format() );
		}

		wp_reset_query();
		?>
	</div>
</div>

<?php
get_footer();