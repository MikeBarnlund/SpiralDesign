<div id="post-<?php the_ID(); ?>" class="post editable">
	<?php $image = wp_get_attachment_image_src(get_field('feature_image'), 'full'); ?>
	<img src="<?php echo $image[0]; ?>" alt="<?php get_the_title(get_field('feature_image')) ?>" />

	<?php
	$state = get_field( 'state' );
	switch ( $state ) {
		case 'upnext':
			echo '<div class="up-next"><h3>UP NEXT</h3></div>';
			break;
		case 'featured':
			echo '<h3 class="featured-interview">FEATURED</h3>';
			break;
	}
	?>

	<?php edit_post_link( __( 'Edit', 'iandi' ), "<div class=\"edit-link\">", "</div>" ) ?>

	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'iandi' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h2>

	<h3>
		<?php the_field( 'interviewee_title' ); ?>
	</h3>
</div>