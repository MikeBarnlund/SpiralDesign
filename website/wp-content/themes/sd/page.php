<?php

get_header();

the_post();

?>

<div class="page-banner" style="background-image: url(<?php the_field('image'); ?>)">
	<div class="banner-content">
		<h1><?php the_title(); ?></h1>
	</div>
</div>
<div class="content">
	<div class="row-fluid">
		<div class="span8">
			<?php the_content(); ?>
		</div>
		
		<div class="span4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php

get_footer();

?>