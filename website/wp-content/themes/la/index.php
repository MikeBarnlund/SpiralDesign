<?php

get_header();

/* Main Loop */

while ( have_posts() ) :
	the_post();
	get_template_part( 'post' );
endwhile;

get_footer();

get_template_part( 'footer', 'bare' );