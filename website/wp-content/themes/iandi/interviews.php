<?php
/*
Template Name: Interviews
*/

get_header();

?>

<div class="content">
	<h1 class="entry-title"><span>Industry <em>Leaders</em></span></h1>
	<div class="interviews">
		<?php

		/* Main Loop */

		$query = "
			SELECT wposts.*
			FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
			WHERE wposts.ID = wpostmeta.post_id
			AND wpostmeta.meta_key = 'state'
			AND wpostmeta.meta_value != 'upcoming'
			AND wposts.post_status = 'publish'
			AND wposts.post_type = 'interview'
			ORDER BY wpostmeta.meta_value DESC,
			wposts.post_date DESC
		";

		$the_posts = $wpdb->get_results( $query, OBJECT );
		$posts_per_row = 5;
		$i = 1;

		foreach ( $the_posts as $post) {
			setup_postdata( $post );
			$slat_class = $i++ === $posts_per_row ? 'last' : '';
			include( locate_template( 'interview-slat.php' ) );
		}
		?>
	</div> <!-- .interviews -->
</div> <!-- .content -->

<?php

get_footer();

?>