<?php

get_header();

the_post();

?>

<div class="content">
	<?php if ( get_the_ID() ) { ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-title">
				<h1><?php the_title(); ?></h1>
				<h2><?php the_field( 'subheading' ); ?></h2>
				<div class="down-arrow-black"></div>
			</div>
			
			<div class="entry-content editable">
				<?php the_content(); ?>
				<?php edit_post_link( __( 'Edit', 'sdbase' ), '<div class="edit-link">', '</div>' ) ?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'sdbase' ) . '&after=</div>') ?>
			</div><!-- .entry-content -->
		</div><!-- #post-<?php the_ID(); ?> -->
	<?php }
	get_template_part( 'share' ); ?>
</div>

<?php

get_footer();

?>