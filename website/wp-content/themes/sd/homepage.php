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
	<div class="row-fluid">
		<div class="span5">
			<?php the_content(); ?>
		</div>
		<div class="span7">
			<?php

			$args = array( 'orderby' => 'menu_order', 'post_type' => 'application', 'posts_per_page' => 100 );
			$loop = new WP_Query( $args );
			$i = 0;

			while ( $loop->have_posts() ) : $loop->the_post(); 
				echo ( $i % 2 === 0 ? '<div class="row-fluid">' : '' );
				$i++;
				
				$application_image_id = get_field('application_image');
				$application_thumb_url = wp_get_attachment_image_src( $application_image_id, 'application-thumb' )[0];
				var_dump($application_thumb_url);
				
				?>
				<div class="span6">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $application_thumb_url; ?>" /></a>
					<h3><?php the_title(); ?></h3>
					<?php the_field('summary'); ?>
					<a href="<?php the_permalink(); ?>" class="button">Learn More &raquo;</a>
				</div>
				<?php 
				echo ( $i % 2 === 0 ? '</div>' : '' );
			endwhile; ?>
		</div>
</div>

<?php

get_footer();

?>