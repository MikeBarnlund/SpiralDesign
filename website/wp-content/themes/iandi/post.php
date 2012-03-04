<div id="post-<?php the_ID(); ?>" class="post editable">
	<?php edit_post_link( __( 'Edit', 'iandi' ), "<div class=\"edit-link\">", "</div>" ) ?>
	<h2 class="entry-title">
		<?php the_title(); ?>
	</h2>

	<?php $image = wp_get_attachment_image_src(get_field('feature_image'), 'full'); ?>
	<img src="<?php echo $image[0]; ?>" alt="<?php get_the_title(get_field('feature_image')) ?>" />
	<?php the_field( 'feature_video_embed_code_small' ); ?>

	<div class="entry-meta">
		<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
	</div>

	<div class="entry-content">
		<?php
		global $more;
		$more = 0;
		?>
		<?php the_content( __( 'Read More', 'vv' ) ); ?>
		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'iandi' ) . '&after=</div>') ?>
	</div>
</div>