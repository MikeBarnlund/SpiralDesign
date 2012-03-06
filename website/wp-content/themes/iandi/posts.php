<?php
/*
Template Name: Posts
*/

get_header();

?>

<div class="content">
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php

	/* Main Loop */

	//omit category "Home Page Only"
	$the_posts = query_posts( 'posts_per_page=3' );
	//$the_posts = get_posts( );

	foreach ( $the_posts as $post) {
		setup_postdata( $post );
		get_template_part( 'content', get_post_format() );
	}

	/* Bottom post navigation */

	global $wp_query;
	$total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) {
	} ?>
</div> <!-- .content -->

<?php

get_footer();

?>