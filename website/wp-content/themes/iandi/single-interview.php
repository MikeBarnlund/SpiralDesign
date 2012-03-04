<?php
get_header();
the_post();
?>

<div class="content-with-sidebar">
	<?php
	if ( get_the_ID() ) {
	?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_template_part( 'interview', 'header' ); ?>
		<div class="entry-content editable">
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit', 'iandi' ), '<div class="edit-link">', '</div>' ) ?>
			<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'iandi' ) . '&after=</div>') ?>
		</div><!-- .entry-content -->
		<?php
		if ( post_custom('links') ) { ?>
			<div class="links">
				<h3>Check Out:</h3>
				<ul>
					<?php
					$links = explode('<br />', get_field( 'links' ) );
					foreach ( $links as $link ) {
						echo '<li><a href="' . $link . '">' . $link . '</a></li>';
					}
					?>
				</ul>
			</div>
		<?php } ?>
	</div><!-- #post-<?php the_ID(); ?> -->
	<?php } ?>
</div>

<?php
get_footer();
?>