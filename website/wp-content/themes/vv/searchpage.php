<?php
/*
Template Name: Search Page
*/

setlocale( LC_MONETARY, 'en_US' ); // needed for money formatting

get_header();

$type = $_POST['type'];
$price_min = $_POST['price_min'];
$price_max = $_POST['price_max'];
$community = $_POST['community'];
$bedroom_min = $_POST['bedroom_min'];
$bedroom_max = $_POST['bedroom_max'];

$query = NULL;

// everything will get posted, so let's just check the first one
if ( !empty( $type ) ) {

	$args = array(
		'post_type' => 'listing',
		'nopaging' => 'true'
	);

	$meta_queries = array();

	$meta_queries[] = array(
		'key' => 'state',
		'value' => array( 'featured', 'active' ),
		'compare' => 'IN'
	);

	if ( $type != 'any' ) {
		echo 'Using listing type';
		$args['listingtype'] = $type;
	}

	if ( $price_min != '0' ) {
		echo 'Using price_min';
		$meta_queries[] = array(
			'key' => 'price',
			'value' => $price_min,
			'type' => 'numeric',
			'compare' => '>='
		);
	}

	if ( $price_max != 'any' ) {
		echo 'Using price_min';
		$meta_queries[] = array(
			'key' => 'price',
			'value' => $price_max,
			'type' => 'numeric',
			'compare' => '<='
		);
	}

	if ( $community != 'any' ) {
		echo 'Using community';
		$args['community'] = $community;
	}

	if ( $bedroom_min != 'any' ) {
		echo 'Using bedroom_min';
		$meta_queries[] = array(
			'key' => 'bedroom',
			'value' => $bedroom_min,
			'type' => 'numeric',
			'compare' => '>='
		);
	}

	if ( $bedroom_max != 'any' ) {
		echo 'Using bedroom_max';
		$meta_queries[] = array(
			'key' => 'bedroom',
			'value' => $bedroom_max,
			'type' => 'numeric',
			'compare' => '<='
		);
	}

	$args['meta_query'] = $meta_queries;

	$query = new WP_Query( $args );
}

$dump = $query->request;
echo $dump;

?>

<div class="content">
	<form method="post" class="search" id="searchform" action="/search">

		<label>Type:</label>
		<select id="type" name="type">
			<?php
			echo '<option value="any">Any Listing Type</option>';
			$terms = get_terms( 'listingtype' );
			foreach ( $terms as $term ) {
				$selected = ( $type == $term->slug ) ? ' selected="selected"' : '';
				echo '<option value="' . $term->slug . '"' . $selected . '>' . $term->name . '</option>';
			}
			?>
		</select>

		<label>Price Range:</label>
		<select id="price_min" name="price_min">
			<?php
			echo '<option value="0">$0</option>';
			$price = 100000;
			while ( $price <= 1000000 ) {
				$selected = ( $price_min == $price ) ? ' selected="selected"' : '';
				echo '<option value="' . $price . '"' . $selected . '>' . money_format( '%.0n', $price ) . '</option>';
				$price += 25000;
			}
			?>
		</select>
		to
		<select id="price_max" name="price_max">
			<?php
			echo '<option value="any">Any</option>';
			$price = 100000;
			while ( $price <= 1000000 ) {
				$selected = ( $price_max == $price ) ? ' selected="selected"' : '';
				echo '<option value="' . $price . '"' . $selected . '>' . money_format( '%.0n', $price ) . '</option>';
				$price += 25000;
			}
			?>
		</select>

		<label>Community:</label>
		<select id="community" name="community">
			<?php
			echo '<option value="any">Any Community</option>';
			$terms = get_terms( 'community' );
			foreach ( $terms as $term ) {
				$selected = ( $community == $term->slug ) ? ' selected="selected"' : '';
				echo '<option value="' . $term->slug . '"' . $selected . '>' . $term->name . '</option>';
			}
			?>
		</select>

		<label>No. Of Bedrooms:</label>
		<select id="bedroom_min" name="bedroom_min">
			<?php
			echo '<option value="any">Any</option>';
			for ( $i = 1; $i < 8; $i++ ) {
				$selected = ( $bedroom_min == $i ) ? ' selected="selected"' : '';
				echo '<option value="' . $i . '"' . $selected . '>' . $i . '</option>';
			}
			?>
		</select>
		to
		<select id="bedroom_max" name="bedroom_max">
			<?php
			echo '<option value="any">Any</option>';
			for ( $i = 1; $i < 8; $i++ ) {
				$selected = ( $bedroom_max == $i ) ? ' selected="selected"' : '';
				echo '<option value="' . $i . '"' . $selected . '>' . $i . '</option>';
			}
			?>
		</select>

		<button type="submit" class="submit" name="submit" id="searchsubmit">Submit</button>
	</form>

	<?php
	if ( !empty( $query ) ) { ?>
		<div class="section">
			<?php
			// The Loop
			while ( $query->have_posts() ) : $query->the_post();
				get_template_part( 'listing', 'slat' );
			endwhile;
			?>
		</div>
	<?php } ?>
</div>

<?php

get_footer();

?>