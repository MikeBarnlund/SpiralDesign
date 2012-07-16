<?php

get_header();

the_post();

?>
<div class="main with-side-image clearfix">
	<div class="content">
		<?php if ( get_the_ID() ) { ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-title">
					<h1><?php the_title(); ?></h1>
					<h2><?php the_field( 'subheading' ); ?></h2>
					<div class="down-arrow-black"></div>
				</div>
			
				<div class="entry-content editable clearfix">
					<?php the_content(); ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php

get_footer();

get_template_part( 'body', 'close' );

?>