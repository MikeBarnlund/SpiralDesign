<?php

/*
Template Name: Events
*/

get_header();

the_post();

?>
<div class="main clearfix">
	<div class="content">
		<?php if ( get_the_ID() ) { ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-title">
					<h1><?php the_title(); ?></h1>
					<h2><?php the_field( 'subheading' ); ?></h2>
					<div class="down-arrow-black"></div>
				</div>
			
				<div class="entry-content clearfix">
					
					<?php
					$events = get_field( 'events' );
					$main_event = $events[0];
					$event_image_url = wp_get_attachment_image_src( $main_event['event_image'], 'full' );
					$event_name = $main_event['event_name'];
					$event_date = $main_event['event_date'];
					$event_description = $main_event['event_description']; ?>
					
					<div class="main-event">
						<img src="<?php echo $event_image_url[0]; ?>" />
						<div class="event-content">
							<h2><?php echo $event_name; ?></h2>
							<span><?php echo $event_date; ?></span>
							<div class="description">
								<?php echo $event_description; ?>
							</div>
						</div>
					</div>
					
					<ul class="events">
					<?php
					// iterate through the images including featured image (use wordpress thumbnails?)
					foreach( $events as $event ) {
						$event_image_url = wp_get_attachment_image_src( $event['event_image'], 'full' );
						$event_name = $event['event_name'];
						$event_date = $event['event_date'];
						$event_description = $event['event_description']; ?>
						<li>
							<img src="<?php echo $event_image_url[0]; ?>" />
							<div class="event-content">
								<h2><?php echo $event_name; ?></h2>
								<span><?php echo $event_date; ?></span>
								<div class="description">
									<?php echo $event_description; ?>
								</div>
							</div>
						</li>
					<?php } ?>
					</ul>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php

get_footer();

?>