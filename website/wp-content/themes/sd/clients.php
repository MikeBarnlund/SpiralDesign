<?php

/*
Template Name: Clients
*/

get_header();

the_post();

?>

<div class="content">
	<?php if ( get_the_ID() ) { ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-title">
				<h1><?php the_title(); ?></h1>
				<h2><?php the_field( 'subheading' ); ?></h2>
				<div class="down-arrow-black"></div>
			</div>
			
			<div class="entry-content editable">
				<ul class="clients">
				<?php
				// iterate through the images including featured image (use wordpress thumbnails?)
				$clients = get_field( 'clients' );
				$imagecount = 1;
				foreach( $clients as $client ) {
					$imagecount++;
					$img_url_full = wp_get_attachment_image_src( $client['client_logo'], 'full' );
					$client_url = $client['client_website_url'];
					$client_title = $client['client_name'];
					echo '<li><a href="' . $client_url . '" target="_blank" title="' . $client_title . '"><img alt="' . $client_title . '" src="' . $img_url_full[0] . '"/></a></li>';
				} ?>
				</ul>
			</div>
		</div>
	<?php } ?>
</div>

<?php

get_footer();

?>