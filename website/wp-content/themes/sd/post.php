<div id="post-<?php the_ID(); ?>" class="post editable">
	<?php edit_post_link( __( 'Edit', 'sdbase' ), "<div class=\"edit-link\">", "</div>" ) ?>
	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title(); ?></a>
	</h2>
	<div class="entry-meta">
		<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
	</div>

	<div class="entry-content">
		<?php
		global $more;
		$more = 0;
		?>
		<?php the_content( __( 'Read', 'vv' ) ); ?>
		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sdbase' ) . '&after=</div>') ?>
	</div>
	
	<?php
	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( __( ', ', 'sd' ) );
	if ( $categories_list ): ?>
	<div class="cat-links">
		<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'sd' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?>
	</div>
	<?php endif; // End if categories ?>
	
	<div class="tags"><?php the_tags( 'Tagged As: ', '&nbsp;' ); ?></div>

	<?php get_template_part( 'share' ); ?>
</div>