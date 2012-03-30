<div class="interview-header">
	<?php
	$feature_image = wp_get_attachment_image_src( get_field( 'feature_image' ), 'full' );
	$feature_image_single = is_single()
		? wp_get_attachment_image_src( get_field( 'feature_image_single_interview_page' ), 'full' )
		: false;
	?>
	<img class="featured" src="<?php echo !empty( $feature_image_single ) ? $feature_image_single[0] : $feature_image[0]; ?>" alt="<?php get_the_title(get_field('feature_image')) ?>" />

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
			<?php
			$summary = get_field( 'summary' );
			$more_link_location = is_single() ? FALSE : strpos( $summary, '<!--more-->' );
			echo ( $more_link_location !== FALSE ) ? rtrim( substr( $summary, 0, $more_link_location ) ) . '...' : $summary;
			?>
		</div>

		<?php
		if ( is_single() ) { ?>
			<img class="read-interview" src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/down-arrow.png" />
		<?php } else { ?>
			<a class="read-interview" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'iandi' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">Read Interview&nbsp;&nbsp;<em>>></em></a>
		<?php } ?>


	</div>
</div>