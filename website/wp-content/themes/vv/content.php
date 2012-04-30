<div id="post-<?php the_ID(); ?>" class="post editable">

	<h2 class="post-title">
		<div><?php the_date( 'jS F' ); ?></div>
		<?php the_title(); ?>
	</h2>

	<div class="entry-meta">
		<span class="entry-date"></span>
	</div>

	<?php
	$image_url = get_field( 'featured_image' );
	echo !empty( $image_url ) ? '<img class="featured-image" src="' . $image_url . '" />' : '';
	?>

	<?php the_content( ); ?>

	<?php edit_post_link( __( 'Edit Content', 'lovecalgary' ) ) ?>
</div>