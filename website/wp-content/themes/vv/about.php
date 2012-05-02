<?php
/*
Template Name: About Page
*/
get_header();

the_post();

?>

<div class="content about-page">
	<img src="<?php bloginfo( 'template_url' ) ?>/assets/img/about.jpg"/>
	<h1 class="page-title">About Love Calgary</h1>
	<?php
	if ( get_the_ID() ) {
	?>
	<div class="entry-content-em">
		<?php the_content(); ?>
		<?php edit_post_link( __( 'Edit Content', 'lovecalgary' ) ) ?>
	</div><!-- /.entry-content -->
	<?php } ?>

</div>

<?php

get_footer();

?>