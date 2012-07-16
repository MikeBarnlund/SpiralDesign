<?php

get_header();

get_posts();

?>
<div class="main clearfix">
	<div class="content">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php get_template_part( 'post', 'list' ); ?>
	</div>
</div>
<?php

get_footer();

get_template_part( 'body', 'close' );

?>