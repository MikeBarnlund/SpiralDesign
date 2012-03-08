<?php
get_header();
the_post();
?>

<div class="content">
	<h1><span><em>Things of</em> Interest</span></h1>
	<div class="featured">
		<?php $image = wp_get_attachment_image_src(get_field('feature_image'), 'full'); ?>
		<img src="<?php echo $image[0]; ?>" alt="<?php get_the_title(get_field('feature_image')) ?>" />
		<?php the_field( 'feature_video_embed_code_full' ); ?>
	</div>
	<div id="post-<?php the_ID(); ?>" class="post-slat">
		<div class="entry-content">

			<?php $show_sep = false; ?>
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'iandi' ) );
				if ( $categories_list ): ?>
					<div class="cat-links">
						<?php printf( __( '%2$s', 'iandi' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
						$show_sep = true; ?>
					</div>
				<?php endif; // End if categories
			endif; ?>

			<h2 class="entry-title">
				<?php the_title(); ?>
			</h2>
			<div class="summary">
				<?php the_content( ); ?>
				<?php edit_post_link( __( 'Edit', 'iandi' ), '<div class="edit-link">', '</div>' ) ?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'iandi' ) . '&after=</div>') ?>
			</div>
		</div>
	</div>

	<?php
	$links = get_field( 'recommended_links' );
	if( $links ) { ?>
		<h1 class="check-out"><span>Check Out</span></h1>
		<ul class="post-links section">
		<?php
		$i = 1;
		foreach( $links as $link ) {
			echo ( $i % 6 ) === 0 ? '</ul><ul class="links">' : '';
			$i++;
			echo '<li><a target="_blank" href="' . $link['link_address'] . '">' . $link['link_text'] . '</a></li>';
		}
		?>
		</ul>
	<?php } ?>
</div>

<?php
get_footer();
?>