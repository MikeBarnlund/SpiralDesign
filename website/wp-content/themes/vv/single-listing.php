<?php

get_header();

?>

<div class="content">
	<?php
	setlocale( LC_MONETARY, 'en_US' ); // needed for money formatting
	?>

	<div id="post-<?php the_ID(); ?>" class="single-listing editable">
		<?php

		$image_url = get_field( 'featured_image' );

		$sold = get_field( 'sold' );

		$price = get_field( 'price' );
		$price = !empty( $price ) ? money_format( '%.0n', $price ) : 'Price Not Available';

		$square_footage = get_field( 'square_footage' );
		$square_footage = !empty( $square_footage ) ? $square_footage .= ' sq. ft.' : 'Size Not Available';

		$address = get_field( 'address' );
		if ( empty( $address ) ) $address = 'Address Not Available';

		echo !empty( $image_url ) ? '<img src="' . $image_url . '" />' : '';

		// iterate through the remaining images (use wordpress thumbnails?)
		$images = get_field( 'other_images' );
		?>

		<ul class="thumbnails">
		<?php foreach( $images as $image ) {
			echo '<li><img src="' . $image['image'] . '"/></li>';
		} ?>
		</ul>

		<h2>
			<?php echo $address; ?>
			<em>|</em>
			<?php echo $square_footage; ?>
			<span class="price"><?php echo $price; ?></span>
		</h2>

		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

		<?php
		echo get_the_term_list( get_the_ID(), 'listingtype' );
		?>

		<div class="entry-content">
			<?php the_content( ); ?>
		</div>

		<div class="other-fields">
			<?php
			// display the optional fields
			?>
		</div>

		<?php edit_post_link( __( 'Edit', 'lovecalgary' ), "<div class=\"edit-link\">", "</div>" ) ?>
	</div>
</div> <!-- .content -->

<?php

get_footer();

?>