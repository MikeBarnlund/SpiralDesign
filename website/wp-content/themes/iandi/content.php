<div id="post-<?php the_ID(); ?>" class="post-slat">
	<div class="featured">
		<?php $image = wp_get_attachment_image_src(get_field('feature_image'), 'full'); ?>
		<img src="<?php echo $image[0]; ?>" alt="<?php get_the_title(get_field('feature_image')) ?>" />
		<?php the_field( 'feature_video_embed_code_small' ); ?>
	</div>

	<div class="entry-content">

		<?php $show_sep = false; ?>
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'iandi' ) );
			if ( $categories_list ): ?>
				<div class="cat-links">
					<span>
					<?php
					$categories = wp_get_post_categories( get_the_ID() );
					foreach ( $categories as $category ) {
						echo get_category( $category )->cat_name;
					}
					?>
					</span>
				</div>
			<?php endif; // End if categories
		endif; ?>

		<h2 class="entry-title">
			<?php the_title(); ?>
		</h2>
		<div class="summary">
			<?php
			global $more;
			$more = 0;
			?>
			<?php the_content( __( 'Full Story&nbsp;&nbsp;<em>>></em>', 'iandi' ) ); ?>
			<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'iandi' ) . '&after=</div>') ?>
		</div>
	</div>
</div>