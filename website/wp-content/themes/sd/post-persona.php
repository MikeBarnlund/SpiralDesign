<table class="persona-slat">
	<tr>
		<?php
		$attachment_id = get_field('photo');
		$size = "full"; // (thumbnail, medium, large, full or custom size)

		$photo_url = wp_get_attachment_url( $attachment_id, $size );
		?>
		<td class="photo"><h2><?php the_field('name'); ?></h2><img src="<?php echo $photo_url; ?>"/></td>
		<td><h2>Characteristics</h2> <?php the_field('characteristics'); ?></td>
		<td><h2>Needs / Motivation</h2> <?php the_field('needs_motivation'); ?></td>
		<td><h2>Value Proposition</h2> <?php the_field('value_proposition'); ?></td>
	</tr>
</table>