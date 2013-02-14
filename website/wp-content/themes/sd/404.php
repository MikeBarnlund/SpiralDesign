<?php

get_header();

the_post();

?>

<div class="page-banner" style="background-image: url(<?php the_field('image'); ?>)">
	<div class="banner-content">
		<h1>Page Not Found</h1>
	</div>
</div>
<div class="content">
	<div class="row-fluid">
		<div class="span8">
			<p>Sorry, that page doesn't exist.</p>
			<a href="/" class="button">&laquo; Back Home</a>
		</div>
		
		<div class="span4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php

get_footer();

?>