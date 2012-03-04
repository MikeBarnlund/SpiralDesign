<?php
/*
Template Name: Interviews
*/

get_header();

?>

<div class="content">
	<h1 class="entry-title"><?php the_title(); ?></h1>
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
		ORDER BY wposts.post_date DESC
	";

	$the_posts = $wpdb->get_results( $query, OBJECT );

	foreach ( $the_posts as $post) {
		setup_postdata( $post );
		get_template_part( 'interview', 'slat' );
	}

	/* Bottom post navigation */

	global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'iandi' )) ?></div>
			<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'iandi' )) ?></div>
		</div>
	<?php } ?>
</div> <!-- .content -->

<?php

get_footer();

?>