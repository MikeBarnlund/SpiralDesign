<div id="post-<?php the_ID(); ?>" class="listing-slat editable">
	<?php
	$image_url = get_field( 'featured_image' );
	$sold = get_field( 'sold' );
	echo !empty( $image_url ) ? '<img src="' . $image_url . '" />' : '';
	?>

	<h2>
		<?php the_field( 'address' ); ?>
		<em>|</em>
		<?php the_field( 'square_footage' ); ?>
		<span class="price"><?php the_field( 'price' ); ?></span>
	</h2>

	<h3><?php the_title(); ?></h3>

	<?php
	echo get_the_term_list( get_the_ID(), 'listingtype' );

	?>

	<div class="entry-content">
		<?php the_content( __( '[view more]', 'vv' ) ); ?>
	</div>

	<?php edit_post_link( __( 'Edit', 'lovecalgary' ), "<div class=\"edit-link\">", "</div>" ) ?>
</div>