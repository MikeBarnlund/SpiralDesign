<?php
/*
Template Name: Contact
*/
get_header();

the_post();

?>

<div class="container contact-page">
	<?php if ( get_the_ID() ) { ?>
		<h1 class="tk-primary">Contact</h1>
		<div class="contact-form">
    		<?php the_content(); ?>
	    </div>
	<?php } ?>
</div>

<?php

get_footer();
get_template_part( 'footer', 'bare' );

?>