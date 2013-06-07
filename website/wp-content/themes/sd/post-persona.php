<div class="persona-slat">
	<?php
	$attachment_id = get_field('photo');
	$size = "full"; // (thumbnail, medium, large, full or custom size)

	$photo_url = wp_get_attachment_url( $attachment_id, $size );
	?>
	<a href="<?php the_permalink(); ?>"><img src="<?php echo $photo_url; ?>"/></a>
	<h3><a href="<?php the_permalink(); ?>"><?php the_field('name'); ?></a></h3>
	<p><?php the_field('summary'); ?></p>
</div>