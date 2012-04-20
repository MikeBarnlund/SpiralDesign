<?php

get_header();

// Set up our listing fields

$image_url = get_field( 'featured_image' );

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

?>

<div class="content">
	<?php
	setlocale( LC_MONETARY, 'en_US' ); // needed for money formatting
	?>

	<div id="post-<?php the_ID(); ?>" class="single-listing editable">
		<?php

		echo !empty( $image_url ) ? '<img src="' . $image_url . '" />' : '';

		// iterate through the remaining images (use wordpress thumbnails?)
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
			$has_optional_fields = false;
			foreach ( $optional_fields as $optional_field ) {
				$has_optional_fields = !empty( $optional_field );
				if ( $has_optional_fields === TRUE ) break;
			}

			if ( $has_optional_fields ) {
				echo '<dl>';
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
		</div>

		<?php edit_post_link( __( 'Edit', 'lovecalgary' ), "<div class=\"edit-link\">", "</div>" ) ?>
	</div>
</div> <!-- .content -->

<?php

get_footer();

?>