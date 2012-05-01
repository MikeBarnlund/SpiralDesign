<?php
/*
Template Name: Main
*/

get_header();
the_post();
?>

<div class="slideshow container">
	<?php
	$images = get_field( 'main_images' );
	if( $images ) { ?>
		<?php
		foreach( $images as $image ) {
			echo '<img src="' . $image['image'] . '" />';
		}
		?>
	<?php } ?>
</div>

<div class="entry-content thin-bottom">
	<h1 class="header-font">About <em>Love Calgary Real Estate</em></h1>
	<?php the_content(); ?>
</div>

<div class="entry-content-em thin-bottom">
	<h1 class="extra-bottom-margin">Featured <em>Listings</em></h1>
	<?php
	$query = "
		SELECT wposts.*
		FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
		WHERE wposts.ID = wpostmeta.post_id
		AND wpostmeta.meta_key = 'state'
		AND wpostmeta.meta_value = 'featured'
		AND wposts.post_status = 'publish'
		AND wposts.post_type = 'listing'
		ORDER BY wposts.post_date DESC
		LIMIT 3
	";

	$the_posts = $wpdb->get_results( $query, OBJECT );

	foreach ( $the_posts as $post) {
		setup_postdata( $post );
		global $more;
		$more = 0;
		get_template_part( 'listing', 'slat' );
	}
	?>
</div>

<?php
get_footer();