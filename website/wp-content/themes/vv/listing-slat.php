<?php
setlocale( LC_MONETARY, 'en_US' ); // needed for money formatting
?>

<div id="post-<?php the_ID(); ?>" class="listing-slat editable">
	<?php

	$image_url = get_field( 'featured_image' );

	$listing_status = get_field( 'listing_status' );

	$price = get_field( 'price' );
	$price = !empty( $price ) ? money_format( '%.0n', $price ) : 'Price Not Available';

	$square_footage = get_field( 'square_footage' );
	$square_footage = !empty( $square_footage ) ? $square_footage .= ' sq. ft.' : 'Size Not Available';

	$address = get_field( 'address' );
	if ( empty( $address ) ) $address = 'Address Not Available';

	echo !empty( $image_url ) ? '<img class="featured-image" src="' . $image_url . '" />' : '';
	echo !empty( $listing_status ) && in_array( 'sold', $listing_status ) ? '<img class="listing-sold" src="' . get_bloginfo( 'template_url' ) . '/assets/img/sold.png"/>' : '';
	?>

	<div class="listing-info-main">
		<?php echo $address; ?>
		<em>|</em>
		<?php echo $square_footage; ?>
		<span class="price"><?php echo $price; ?></span>
	</div>

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<div class="listing-slat-content">
		<?php the_content( __( '[view more]', 'vv' ) ); ?>
		<?php edit_post_link( __( 'Edit Content', 'lovecalgary' ) ) ?>
	</div>
</div>