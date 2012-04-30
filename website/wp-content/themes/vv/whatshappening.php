<?php
/*
Template Name: Whats-Happening
*/

get_header();

?>

<div class="content">
	<h1 class="page-title"><?php the_title(); ?></h1>
	<div class="entry-content">
		<?php

		/* Main Loop */

		//omit category "Home Page Only"
		//$the_posts = query_posts( 'posts_per_page=3' );
		$the_posts = get_posts( );

		foreach ( $the_posts as $post) {
			setup_postdata( $post );
			get_template_part( 'content', get_post_format());
		}

		/* Bottom post navigation */

		global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'lovecalgary' )) ?></div>
				<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'lovecalgary' )) ?></div>
			</div>
		<?php } ?>
	</div>
</div> <!-- .content -->

<?php

get_footer();

?>