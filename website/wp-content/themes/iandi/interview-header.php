<div class="interview-header">
	<?php $image = wp_get_attachment_image_src(get_field('feature_image'), 'full'); ?>
	<img class="featured" src="<?php echo $image[0]; ?>" alt="<?php get_the_title(get_field('feature_image')) ?>" />

	<div class="header-content">
		<div class="interviewee-wrapper">
			<h2 class="entry-title">
				<?php the_title(); ?>
			</h2>
			<h3>
				<?php the_field( 'interviewee_title' ); ?>
			</h3>
		</div>

		<div class="summary">
			<?php the_field( 'summary' ); ?>
			<?php edit_post_link( __( 'Edit', 'iandi' ), '<div class="edit-link">', '</div>' ) ?>
		</div>

		<a class="read-interview" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'iandi' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Read Interview&nbsp;&nbsp;<em>>></em></a>
	</div>
</div>