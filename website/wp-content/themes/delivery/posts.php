<?php

get_header();

get_posts();

?>

<div class="content">
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php get_template_part( 'post', 'list' ); ?>
</div>

<?php

get_footer();

?>