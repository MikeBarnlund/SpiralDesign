<div id="post-<?php the_ID(); ?>" class="post editable">
	<h1 class="entry-title">
		<?php the_title(); ?>
	</h1>
	<div class="entry-meta">
		<span class="entry-date">
			Posted: <abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr>
			<?php edit_post_link( __( 'Edit', 'sdbase' ), "<small>(", ")</small>" ); ?>
		</span>
	</div>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'sdbase' )  ); ?>
		<?php /*get_template_part( 'share' );*/ ?>
		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sdbase' ) . '&after=</div>') ?>
	</div>
</div>