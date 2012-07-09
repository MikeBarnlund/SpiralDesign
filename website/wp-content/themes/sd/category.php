<?php

get_header();

?>

<div class="content">
	<h1 class="entry-title"><?php single_cat_title(); ?></h1>
	<?php get_template_part( 'post', 'list' ); ?>
</div>

<?php

get_footer();

?>