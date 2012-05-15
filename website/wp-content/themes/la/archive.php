<?php

/*
Template Name: Archives
*/

get_header(); ?>

<div class="archives">
    <?php
    if ( have_posts() ) {
        if ( is_month() ) {
            printf( __( '<h1>Monthly Archives: %s</h1>', 'twentyeleven' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyeleven' ) ) . '</span>' );
        }
        echo '<ul>';
        while ( have_posts() ) :
            the_post();
    		/* Include the Post-Format-specific template for the content.
    		 * If you want to overload this in a child theme then include a file
    		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
    		 */
    		 if ( get_the_title() !== 'Archives' ) {
    		     echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
    		 }
        endwhile;
        echo '</ul>';
    } ?>

    <h2>Archives by Month:</h2>
    <ul>
        <?php wp_get_archives(); ?>
    </ul>

</div>

<?php

get_footer();

get_template_part( 'footer', 'bare' );