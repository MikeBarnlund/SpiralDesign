<?php

/*
Template Name: Home
*/

get_header();

//the_post();

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

?>

<div class="content">
	
</div>

<?php

get_footer();

?>