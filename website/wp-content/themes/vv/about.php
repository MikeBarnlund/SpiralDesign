<?php
/*
Template Name: About Page
*/
get_header();

the_post();

?>

<div class="content">
	<?php
	if ( get_the_ID() ) {
	?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<img src="" />
		<h1 class="entry-title"><?php the_title(); ?> Page</h1>
		<div class="entry-content editable">
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit', 'lovecalgary' ), '<div class="edit-link">', '</div>' ) ?>
		</div><!-- .entry-content -->
	</div><!-- #post-<?php the_ID(); ?> -->
	<?php } ?>

</div>

<?php

get_footer();

?>