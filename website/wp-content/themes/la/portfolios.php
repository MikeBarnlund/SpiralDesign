<?php
/*
Template Name: Portfolios Page
*/

get_header();

?>

<div class="container">
    <a href="/portfolio/personal" class='portfolio-slat personal'>Personal</a>
    <a href="/portfolio/commercial" class='portfolio-slat commercial'>Commercial</a>
    <a href="/portfolio/film" class='portfolio-slat film'>Film</a>
</div>

<?php

get_footer();
get_template_part( 'footer', 'bare' );

?>