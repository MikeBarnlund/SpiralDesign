<?php

/*
Template Name: About Subpage
*/

get_header();

the_post();

$page = get_page_by_path('about');
$title = get_the_title($page->ID);
$page_banner_url = get_field('image', $page->ID);

?>

<div class="page-banner" style="background-image: url(<?php echo $page_banner_url; ?>)">
	<div class="banner-content">
		<h1><?php echo $title; ?></h1>
	</div>
</div>

<div class="content">
	<div class="breadcrumb">
		<a href="<?php echo get_permalink( $page->ID ); ?>"><?php echo $title; ?></a>&nbsp;&gt;&nbsp;<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</div>
	<div class="row-fluid">
		<div class="span8">
			<?php the_content(); ?>
			<a href="/about" class="goback">&laquo; Back to About</a>
		</div>
		
		<div class="span4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php

get_footer();

?>