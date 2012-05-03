<?php

setlocale( LC_MONETARY, 'en_US' ); // needed for money formatting

get_header();

// Set up our listing fields

$featured_image_id = get_field( 'featured_image' );
$featured_image = wp_get_attachment_image_src( $featured_image_id, 'full' );
$featured_image_thumb = wp_get_attachment_image_src( $featured_image_id );

$listing_status = get_field( 'listing_status' );

$sold = get_field( 'sold' );

$price = get_field( 'price' );
$price = !empty( $price ) ? money_format( '%.0n', $price ) : 'Price Not Available';

$square_footage = get_field( 'square_footage' );
$square_footage = !empty( $square_footage ) ? $square_footage .= ' sq. ft.' : 'Size Not Available';

$address = get_field( 'address' );
if ( empty( $address ) ) $address = 'Address Not Available';

$images = get_field( 'other_images' );

//optional fields

$optional_fields = array();

$optional_fields['bedrooms'] = get_field( 'bedrooms' );
$optional_fields['bathrooms'] = get_field( 'bathrooms' );
$optional_fields['year_built'] = get_field( 'year_built' );
$optional_fields['property_type'] = get_field( 'property_type' );
$optional_fields['garage_vehicle_spaces'] = get_field( 'garage_vehicle_spaces' );
$optional_fields['living_area'] = get_field( 'living_area' );
$optional_fields['lot_frontage'] = get_field( 'lot_frontage' );
$optional_fields['lot_depth'] = get_field( 'lot_depth' );
$optional_fields['basement'] = get_field( 'basement' );
$optional_fields['taxes'] = get_field( 'taxes' );
$optional_fields['condo'] = get_field( 'condo' );
$optional_fields['mls'] = get_field( 'mls' );

get_template_part( 'listingtypes' );
?>

<div class="entry-content-em single-listing">
	<div class="slideshow">
		<div class="current-image-container">
			<?php
			echo !empty( $featured_image ) ? '<img class="current-image" src="' . $featured_image[0] . '" />' : '';
			echo !empty( $listing_status ) && in_array( 'sold', $listing_status ) ? '<img class="listing-sold" src="' . get_bloginfo( 'template_url' ) . '/assets/img/sold.png"/>' : '';
			?>
		</div>
		<ul class="thumbnails">
			<?php
			// iterate through the images including featured image (use wordpress thumbnails?)
			echo !empty( $featured_image_thumb ) ? '<li><img src="' . $featured_image_thumb[0] . '" /></li>' : '';
			$imagecount = 1;
			foreach( $images as $image ) {
				$imagecount++;
				$url = wp_get_attachment_image_src( $image['image'] );
				$url_full = wp_get_attachment_image_src( $image['image'], 'full' );
				echo '<li ' . ( $imagecount % 4 === 0 ? 'class="last"' : '' ) .'><img src="' . $url[0] . '" full_url="' . $url_full[0] . '"/></li>';
			} ?>
		</ul>
	</div>

	<div class="listing-info-main">
		<?php echo $address; ?>
		<span class="price"><?php echo $price; ?></span>
	</div>

	<h2><?php the_title(); ?></h2>

	<div class="listing-content">
		<?php
		echo apply_filters( 'the_content', $post->post_content );

		$has_optional_fields = false;
		foreach ( $optional_fields as $optional_field ) {
			$has_optional_fields = !empty( $optional_field );
			if ( $has_optional_fields === TRUE ) break;
		}

		if ( $has_optional_fields ) {
			echo '<dl>';
			echo '<dt>Square Footage:</dt><dd>' . $square_footage . '</dd>';
			echo !empty( $optional_fields['bedrooms'] ) ? '<dt>Bedrooms:</dt><dd>' . $optional_fields['bedrooms'] . '</dd>' : '';
			echo !empty( $optional_fields['bathrooms'] ) ? '<dt>Bathrooms:</dt><dd>' . $optional_fields['bathrooms'] . '</dd>' : '';
			echo !empty( $optional_fields['year_built'] ) ? '<dt>Year Built:</dt><dd>' . $optional_fields['year_built'] . '</dd>' : '';
			echo !empty( $optional_fields['property_type'] ) ? '<dt>Property Type:</dt><dd>' . $optional_fields['property_type'] . '</dd>' : '';
			echo !empty( $optional_fields['garage_vehicle_spaces'] ) ? '<dt>Garage Vehicle Spaces:</dt><dd>' . $optional_fields['garage_vehicle_spaces'] . '</dd>' : '';
			echo !empty( $optional_fields['living_area'] ) ? '<dt>Living Area:</dt><dd>' . $optional_fields['living_area'] . '</dd>' : '';
			echo !empty( $optional_fields['lot_frontage'] ) ? '<dt>Lot Frontage:</dt><dd>' . $optional_fields['lot_frontage'] . '</dd>' : '';
			echo !empty( $optional_fields['lot_depth'] ) ? '<dt>Lot Depth:</dt><dd>' . $optional_fields['lot_depth'] . '</dd>' : '';
			echo !empty( $optional_fields['basement'] ) ? '<dt>Basement:</dt><dd>' . $optional_fields['basement'] . '</dd>' : '';
			echo !empty( $optional_fields['taxes'] ) ? '<dt>Taxes:</dt><dd>' . $optional_fields['taxes'] . '</dd>' : '';
			echo !empty( $optional_fields['condo'] ) ? '<dt>Condo:</dt><dd>' . $optional_fields['condo'] . '</dd>' : '';
			echo !empty( $optional_fields['mls'] ) ? '<dt>MLS&reg;:</dt><dd>' . $optional_fields['mls'] . '</dd>' : '';
			echo '</dl>';
		}
		?>

		<?php edit_post_link( __( 'Edit', 'lovecalgary' ), "<div class=\"edit-link\">", "</div>" ) ?>

	</div>

</div> <!-- .content -->

<?php

get_footer();

?>