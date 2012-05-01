<?php

/*
Template Name: Contact Page
*/

get_header();

the_post();

?>

<div class="entry-content contact-page">
	<?php
	if ( get_the_ID() ) {
	?>
	<img src="<?php bloginfo( 'template_url' ) ?>/assets/img/contact.jpg"/>

	<h1 class="page-title"><?php the_title(); ?></h1>
	<div class="entry-content-em"><?php the_content(); ?></div>

	<?php } ?>

</div>

<?php

get_footer();

?>