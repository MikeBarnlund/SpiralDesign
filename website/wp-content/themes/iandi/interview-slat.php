<?php
$state = get_field( 'state' );
$special_interview_markup = '';
$interview_link = $state === 'upnext'
	? get_field( 'personal_site_url' )
	: get_permalink();
$interview_title = $state === 'upnext'
	? get_the_title() . '\'s Site'
	: 'Permalink to ' . get_the_title() .'\'s Interview';

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

	<a href="<?php echo $interview_link; ?>" title="<?php echo $interview_title; ?>" rel="bookmark"><img src="<?php echo $image[0]; ?>" alt="<?php get_the_title(get_field('feature_image')) ?>" /></a>

	<?php echo $special_interview_markup; ?>

	<div class="interviewee-info">
		<h2>
			<a href="<?php echo $interview_link; ?>" title="<?php echo $interview_title; ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<h3 class="interviewee-title">
			<?php the_field( 'interviewee_title' ); ?>
		</h3>
	</div>
</div>