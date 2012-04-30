<?php
/*
Template Name: Resources
*/

get_header();

the_post();

?>

<div class="content resources-page">
	<h1 class="page-title"><?php the_title(); ?></h1>
	<?php
	if ( get_the_ID() ) { ?>
		<div id="post-<?php the_ID(); ?>" class="entry-content page">
			<?php
			$resource_sections = array( 'buying', 'selling', 'other' );
			foreach ( $resource_sections as $res ) {
				$resources = get_field( $res );
				if( $resources ) { ?>
					<div class="resources section">
						<h3><?php echo $res; ?></h3>
						<ul>
						<?php foreach( $resources as $resource ) {
							$url = $resource['link_url'];
							$file = $resource['link_file'];
							$text = $resource['link_text'];
							if ( !empty( $file ) ) {
								echo '<li><a href="' . $file . '">' . $text . '</a></li>';
							} else if ( !empty( $url ) ) {
								echo '<li><a target="_blank" href="' . $url . '">' . $text . '</a></li>';
							} else {
								echo '<li>' . $text . '</li>';
							}
						} ?>
						</ul>
					</div>
				<?php }
			} ?>

			<?php edit_post_link( __( 'Edit Content', 'lovecalgary' ) ) ?>
		</div><!-- #post-<?php the_ID(); ?> -->
	<?php } ?>
</div>

<?php

get_footer();

?>