<?php

get_header();

/* Top post navigation */
global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'lovecalgary' )) ?></div>
		<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'lovecalgary' )) ?></div>
	</div>
<?php }

/* Main Loop */

while ( have_posts() ) :
	the_post();
	get_template_part( 'content' );
endwhile;

/* Bottom post navigation */

global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
	<div id="nav-below" class="navigation">
		<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'lovecalgary' )) ?></div>
		<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'lovecalgary' )) ?></div>
	</div>
<?php }

get_footer();