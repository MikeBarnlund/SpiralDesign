<?php
/*
Template Name: Contact
*/
get_header();

the_post();

?>

<div class="container contact-page clearfix">
    <?php get_template_part( 'navigation' ); ?>
	<?php if ( get_the_ID() ) { ?>
		<div class="contact-form clearfix">
	        <h1>Contact</h1>
		    <?php the_content(); ?>
	    </div>
	<?php } ?>
</div>

<?php

get_footer();
get_template_part( 'footer', 'bare' );

?>