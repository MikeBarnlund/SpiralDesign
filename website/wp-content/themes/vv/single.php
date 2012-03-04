<?php get_header(); ?>

<?php the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="post editable">
	<?php edit_post_link( __( 'Edit', 'sdbase' ), "<div class=\"edit-link\">", "</div>" ) ?>
	<h2 class="entry-title">
		<?php the_title(); ?>
	</h2>
	<div class="entry-meta">
		<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
	</div>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'sdbase' )  ); ?>
		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sdbase' ) . '&after=</div>') ?>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>