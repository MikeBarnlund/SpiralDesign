<?php

/*
Template Name: Home
*/

get_header();

?>

<?php

$args = array( 'post_type' => 'homepageslide' );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	?>
	<div class="home-banner" style="background-image: url(<?php the_field('image'); ?>)">
		<div class="banner-content">
			<h1><?php the_title(); ?></h1>
			<div class="summary"><p><?php the_field('summary'); ?></p></div>
			<div class="next-button"><a>&gt;</a></div>
		</div>
	</div>
	<?php
endwhile;

//wp_reset_postdata();

the_post();

?>

<div class="content">
	<?php the_content(); ?>
</div>

<?php

get_footer();

?>