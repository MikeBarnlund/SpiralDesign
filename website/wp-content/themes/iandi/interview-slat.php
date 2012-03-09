<?php
$state = get_field( 'state' );
$special_interview_markup = '';
switch ( $state ) {
	case 'upnext':
		$special_interview_markup = '<h3 class="up-next">UP NEXT</h3>';
		break;
	case 'featured':
		$special_interview_markup =  '<h3 class="featured-interview">FEATURED</h3>';
		break;
}
?>

<div id="post-<?php the_ID(); ?>" class="interview-slat <?php echo $state; ?> <?php echo $slat_class; ?>">
	<?php $image = wp_get_attachment_image_src(get_field('feature_image'), 'full'); ?>
	<img src="<?php echo $image[0]; ?>" alt="<?php get_the_title(get_field('feature_image')) ?>" />

	<?php
	$state = get_field( 'state' );
	echo $special_interview_markup;
	?>

	<div class="interviewee-info">
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'iandi' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<h3 class="interviewee-title">
			<?php the_field( 'interviewee_title' ); ?>
		</h3>
	</div>
</div>