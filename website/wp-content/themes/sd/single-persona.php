<?php

get_header();

the_post();

?>

<div class="content">
	<?php if ( get_the_ID() ) { ?>
		<div id="post-<?php the_ID(); ?>" class="post">
			<h1 class="post-title">
				<?php the_title(); ?>
			</h1>
			
			<table class="persona">
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

			<?php get_template_part( 'share' ); ?>
		</div>
	<?php } ?>
</div>

<?php

get_footer();

?>