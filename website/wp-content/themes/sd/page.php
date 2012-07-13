<?php

get_header();

the_post();

?>
<div class="content with-side-image">
	<?php if ( get_the_ID() ) { ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry-title">
				<h1><?php the_title(); ?></h1>
				<h2><?php the_field( 'subheading' ); ?></h2>
				<div class="down-arrow-black"></div>
			</div>
			
			<div class="entry-content editable">
				<?php the_content(); ?>
			</div>
		</div>
	<?php } ?>
</div>

<?php

get_footer();

?>