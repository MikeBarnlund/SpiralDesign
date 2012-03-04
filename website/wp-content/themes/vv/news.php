<?php
/*
Template Name: News
*/

get_header();

?>

<div class="content-with-sidebar">
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php

	/* Main Loop */

	//omit category "Home Page Only"
	$the_posts = get_posts( );

	foreach ( $the_posts as $post) {
		setup_postdata( $post );
		get_template_part( 'post' );
	}

	/* Bottom post navigation */

	global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'sdbase' )) ?></div>
			<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'sdbase' )) ?></div>
		</div>
	<?php } ?>
</div> <!-- .content-with-sidebar -->

<?php

get_sidebar();

get_footer();

?>