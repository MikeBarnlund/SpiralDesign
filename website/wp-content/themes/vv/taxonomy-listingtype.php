<?php

get_header();

?>

<div class="listings content">
	<?php get_template_part( 'listingtypes' ); ?>
	<div class="entry-content">
		<?php while ( have_posts() ) : the_post();
			if ( get_field( 'state' ) != 'inactive' ) {
				get_template_part( 'listing', 'slat' );
			}
		endwhile; ?>
	</div>
</div> <!-- .content -->

<?php

get_footer();

?>