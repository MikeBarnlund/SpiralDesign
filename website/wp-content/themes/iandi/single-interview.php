<?php
get_header();
the_post();
?>

<div class="content">
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
		$links = get_field( 'recommended_links' );
		if( $links ) { ?>
			<h1>Recommended</h1>
			<ul>
			<?php foreach( $links as $link ) {
				echo '<li><a target="_blank" href="' . $link['link_address'] . '">' . $link['link_text'] . '</a></li>';
			} ?>
			</ul>
		<?php } ?>
	</div><!-- #post-<?php the_ID(); ?> -->
	<?php } ?>
</div>

<?php
get_footer();
?>