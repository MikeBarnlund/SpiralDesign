<?php

get_header();

/* Main Loop */

while ( have_posts() ) :
	the_post();
	get_template_part( 'post' );
endwhile;

next_post_link( format, link, in_same_cat, excluded_categories );

previous_post_link( '%link', __( '<span class="meta-nav">←</span> Previous', 'twentyeleven' ) );
echo ' | ';
next_post_link( '%link', __( 'Next <span class="meta-nav">→</span>', 'twentyeleven' ) );

get_footer();

get_template_part( 'footer', 'bare' );