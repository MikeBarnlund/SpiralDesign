<?php

/*
Template Name: About
*/

get_header();

the_post();

?>

<div class="about-page">
    <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/about-bg.jpg" />
	<?php the_content(); ?>
	<div class="about-links">
        <a class="tcd-small" href="/">
            <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/tcd-logo-small.png" />
        </a>
	    <a target="_blank" href="http://loriandrewsphotography.com" class="lap"></a>
	    <a target="_blank" href="http://loriandrewsinteriors.com" class="lai"></a>
	</div>
	<div class="logo-bottom"></div>
</div>

<?php

get_footer();
get_template_part( 'footer', 'bare' );

?>