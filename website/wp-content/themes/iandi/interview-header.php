<div class="interview-header">
	<?php $image = wp_get_attachment_image_src(get_field('feature_image'), 'full'); ?>
	<img src="<?php echo $image[0]; ?>" alt="<?php get_the_title(get_field('feature_image')) ?>" />

	<h2 class="entry-title">
		<?php the_title(); ?>
	</h2>

	<h3>
		<?php the_field( 'interviewee_title' ); ?>
	</h3>

	<div class="summary">
		<?php the_field( 'summary' ); ?>
	</div>
</div>