<?php

get_header();

$page = get_page_by_path('applications');
$title = get_the_title($page->ID);
$page_banner_url = get_field('image', $page->ID);

?>

<div class="page-banner" style="background-image: url(<?php echo $page_banner_url; ?>)">
	<div class="banner-content">
		<h1><?php echo $title; ?></h1>
	</div>
</div>

<?php

the_post();

?>
<div class="content">
	<div class="row-fluid">
		<div class="span8">
			<h2><?php the_title(); ?></h2>
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