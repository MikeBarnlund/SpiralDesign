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
			
			<table class="vision-board">
				<tr>
					<td colspan="4"><h2>Vision Statement</h2> <?php the_field('vision_statement'); ?></td>
				</tr>
				<tr>
					<td><h2>Target Group</h2> <?php the_field('target_group'); ?></td>
					<td><h2>Needs</h2> <?php the_field('needs'); ?></td>
					<td><h2>Product</h2> <?php the_field('product'); ?></td>
					<td><h2>Value</h2> <?php the_field('business_value'); ?></td>
				</tr>
			</table>

			<?php get_template_part( 'share' ); ?>
		</div>
	<?php } ?>
</div>

<?php

get_footer();

?>