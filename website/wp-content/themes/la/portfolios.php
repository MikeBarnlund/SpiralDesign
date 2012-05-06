<?php
/*
Template Name: Portfolios Page
*/

get_header();

?>

<div>
	<?php

        $term = NULL;

        $args = array( 'post_type' => 'portfolio' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();
            get_template_part( 'portfolio', 'slat' );
        endwhile;
		?>
</div>

<?php

get_footer();
get_template_part( 'footer', 'bare' );

?>