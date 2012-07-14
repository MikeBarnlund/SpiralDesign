<?php

/*
Template Name: Home
*/

get_header();

the_post();

$services = get_field( 'services' );
$service = $services[0];

$service_image = wp_get_attachment_image_src( $service['service_image'], 'full' );
$service_image_url = $service_image[0];
$service_name = $service['service_name'];
$service_summary = $service['service_summary'];
$service_link = $service['service_link'];

?>
<div class="slideshow">
	<div class="item">
		<img src="<?php echo $service_image_url; ?>" />
		<div class="service-content">
			<a href="<?php echo $service_link; ?>" title="<?php echo $service_name; ?>">
				<h2><?php echo $service_name; ?></h2>
				<h3><?php echo $service_summary; ?></h3>
			</a>
		</div>
	</div>
</div>
<div class="main clearfix">
	<div class="content">
		<ul class="services">
			<?php
			// iterate through the images including featured image (use wordpress thumbnails?)
			foreach( $services as $service ) {
				$service_image = wp_get_attachment_image_src( $service['service_image'], 'full' );
				$service_image_url = $service_image[0];
				$service_name = $service['service_name'];
				$service_summary = $service['service_summary'];
				$service_link = $service['service_link']; ?>
				<li>
					<a href="<?php echo $service_link; ?>" title="<?php echo $service_name; ?>">
						<label><?php echo $service_name; ?></label>
						<h3><?php echo $service_summary; ?></h3>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>

<?php

get_footer();

?>