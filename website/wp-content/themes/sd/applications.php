<?php

/*
Template Name: Applications
*/

get_header();

the_post();

?>

<div class="page-banner" style="background-image: url(<?php the_field('image'); ?>)">
	<div class="banner-content">
		<h1><?php the_title(); ?></h1>
	</div>
</div>
<div class="content">
	<div class="row-fluid">
		<div class="span8">
			<?php the_content(); ?>
			<div class="row-fluid">
				<div class="span12 application-slat">

					<?php

					$args = array( 'orderby' => 'menu_order', 'post_type' => 'application', 'posts_per_page' => 100 );
					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post(); 					
						$application_image_id = get_field('application_image');
						$application_image_url = wp_get_attachment_image_src( $application_image_id, 'application-thumb' )[0];
						?>
						<div class="row-fluid">
							<div class="span6">
								<div class="image-container">
									<img src="<?php echo $application_image_url; ?>" />
								</div>
							</div>
							<div class="span6">
								<h2><?php the_title(); ?></h2>
								<?php the_field('summary_bullets'); ?>
								<a href="<?php the_permalink(); ?>" class="button">Learn More &raquo;</a>
							</div>
						</div>
						<?php 
					endwhile; ?>

				</div>
			</div>
		</div>
		
		<div class="span4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php

get_footer();

?>