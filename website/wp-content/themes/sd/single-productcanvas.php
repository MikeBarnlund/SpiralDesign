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
			
			<table class="product-canvas">
				<tr class="top-row">
					<td colspan="2">
						<h2>Goal</h2>
						<?php the_field('goal'); ?>
					</td>
					<td colspan="2">
						<h2>Name</h2>
						<?php the_field('name'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<h2>Personas</h2>
						<?php 
						$rows = get_field( 'personas' );
						
						foreach ( $rows as $row ) {
							global $post;
							$post = $row['persona'];
							setup_postdata( $post );
							get_template_part( 'post', 'persona' );
						}
						
						wp_reset_postdata();
						?>
					</td>
					<td colspan="2" class="big-picture">
						<h2>The Big Picture</h2>
						<?php
						if ( get_field( 'epics' ) ) {
							while ( has_sub_field( 'epics' ) ) { ?>
								<div class="epic-slat clearfix">
									<?php
									$persona = get_sub_field('persona');
									$attachment_id = get_post_meta( $persona->ID, 'photo', true );
									$size = "full"; // (thumbnail, medium, large, full or custom size)
									$photo_url = wp_get_attachment_url( $attachment_id, $size );
									?>
									<img src="<?php echo $photo_url; ?>"/>
									<?php the_sub_field('epic'); ?>
								</div>
							<?php }	
						} ?>
					</td>
					<td>
						<h2>Product Details</h2>
					</td>
				</tr>
			</table>

			<?php get_template_part( 'share' ); ?>
		</div>
	<?php } ?>
</div>

<?php

get_footer();

?>