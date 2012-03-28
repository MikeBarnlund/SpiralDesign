<?php
/*
Template Name: Posts
*/

get_header();

$paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;

?>

<div class="content section">
	<h1 class="entry-title"><span><em>Things of</em> Interest</span></h1>
	<?php

	/* Main Loop */

	//omit category "Home Page Only"
	$the_posts = query_posts( array( 'posts_per_page' => 5, 'paged' => $paged ) );
	$i = 0;

	foreach ( $the_posts as $post) {
		if ( $i++ > 1 ) {
			setup_postdata( $post );
			get_template_part( 'content', get_post_format() );

		}
	}

	?>
</div> <!-- .content -->

<?php

get_footer();

?>