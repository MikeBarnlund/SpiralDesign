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
		$args['listingtype'] = $type;
	}

	if ( $price_min != '0' ) {
		$meta_queries[] = array(
			'key' => 'price',
			'value' => $price_min,
			'type' => 'numeric',
			'compare' => '>='
		);
	}

	if ( $price_max != 'any' ) {
		$meta_queries[] = array(
			'key' => 'price',
			'value' => $price_max,
			'type' => 'numeric',
			'compare' => '<='
		);
	}

	if ( $community != 'any' ) {
		$args['community'] = $community;
	}

	if ( $bedroom_min != 'any' ) {
		$meta_queries[] = array(
			'key' => 'bedroom',
			'value' => $bedroom_min,
			'type' => 'numeric',
			'compare' => '>='
		);
	}

	if ( $bedroom_max != 'any' ) {
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

?>

<div class="content">
	<div class="entry-content search-page">
		<h1 class="page-title">Search Listings</h1>
		<div class="entry-content-em">
			<form method="post" class="search" id="searchform" action="/search">
				<div class="form-fields">
					<label>Type:</label>
					<div class="select-cutoff">
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
					</div>

					<label>Price Range:</label>
					<div class="select-cutoff">
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
					</div>
					<span>to</span>
					<div class="select-cutoff">
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
					</div>

					<label>Community:</label>
					<div class="select-cutoff">
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
					</div>

					<label>No. Of Bedrooms:</label>
					<div class="select-cutoff">
						<select id="bedroom_min" name="bedroom_min">
							<?php
							echo '<option value="any">Any</option>';
							for ( $i = 1; $i < 8; $i++ ) {
								$selected = ( $bedroom_min == $i ) ? ' selected="selected"' : '';
								echo '<option value="' . $i . '"' . $selected . '>' . $i . '</option>';
							}
							?>
						</select>
					</div>
					<span>to</span>
					<div class="select-cutoff">
						<select id="bedroom_max" name="bedroom_max">
							<?php
							echo '<option value="any">Any</option>';
							for ( $i = 1; $i < 8; $i++ ) {
								$selected = ( $bedroom_max == $i ) ? ' selected="selected"' : '';
								echo '<option value="' . $i . '"' . $selected . '>' . $i . '</option>';
							}
							?>
						</select>
					</div>
				</div>
				<button type="submit" class="submit" name="submit" id="searchsubmit">Submit</button>
			</form>
		</div>

		<?php
		if ( !empty( $query ) && $query->have_posts() ) { ?>
			<div class="section">
				<?php
				// The Loop
				while ( $query->have_posts() ) : $query->the_post();
					get_template_part( 'listing', 'slat' );
				endwhile;
				?>
			</div>
		<?php } else if ( !empty( $type ) ) { ?>
			<div class="no-listings">Sorry, no listings matched your search.</div>
		<?php } ?>
	</div>
</div>

<?php

get_footer();

?>