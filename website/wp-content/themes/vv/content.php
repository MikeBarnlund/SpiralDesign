<div id="post-<?php the_ID(); ?>" class="post editable">
	<?php edit_post_link( __( 'Edit', 'lovecalgary' ), "<div class=\"edit-link\">", "</div>" ) ?>

	<div class="entry-meta">
		<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
	</div>

	<?php
	$image_url = get_field( 'featured_image' );
	echo !empty( $image_url ) ? '<img src="' . $image_url . '" />' : '';
	?>

	<h2 class="entry-title">
		<?php the_title(); ?>
	</h2>

	<div class="entry-content">
		<?php the_content( ); ?>
	</div>
</div>