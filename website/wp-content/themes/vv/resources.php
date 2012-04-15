<?php
/*
Template Name: Resources
*/

get_header();

the_post();

?>

<div class="content">
	<?php
	if ( get_the_ID() ) {
	?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-content editable">
			<?php
			$resource_sections = array( 'buying', 'selling', 'other' );
			foreach ( $resource_sections as $res ) {
				$resources = get_field( $res );
				if( $resources ) { ?>
					<h2><?php echo $res; ?></h2>
					<ul class="resources section">
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
				<?php }
			} ?>

			<?php edit_post_link( __( 'Edit', 'lovecalgary' ), '<div class="edit-link">', '</div>' ) ?>
		</div><!-- .entry-content -->
	</div><!-- #post-<?php the_ID(); ?> -->
	<?php } ?>

</div>

<?php

get_footer();

?>