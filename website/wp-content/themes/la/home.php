<?php

/*
Template Name: Home
*/

get_header();

the_post();

?>

<div class="page-container">
    <article>
        <div class="slideshow"></div>
    </article>
    <div class="info">
        <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/info-inactive.png" />
    </div>
    <nav>
        <div class="nav-item"><a href="/portfolio">Portfolio</a></div>
        <div class="portfolio-nav clearfix">
            <a class="portfolio-prev"><img src="<?php bloginfo( 'template_url' ) ?>/assets/img/nav-left.png" /></a>
            <img class="logo" src="<?php bloginfo( 'template_url' ) ?>/assets/img/logo.png" />
            <a class="portfolio-next"><img src="<?php bloginfo( 'template_url' ) ?>/assets/img/nav-right.png" /></a>
        </div>
        <div class="nav-item"><a href="/contact">Contact</a></div>
    </nav>
    <div class="redbar">
        <div class="info-logo"></div>
        <a target="_blank" href="http://www.twitter.com" class="twitter"></a>
        <a target="_blank" href="mailto:someone@theinternet.com" class="mail"></a>
    </div>
</div>

<?php get_footer(); ?>

<script src="<?php bloginfo( 'template_url' ) ?>/assets/js/libs/jquery.sdslideshow.js"></script>

<script>
$( document ).ready( function() {

    var slideshow = null;
    <?php
    $images = get_field( 'home_images' );
    if ( !empty( $images ) ) {
        echo 'imgList = [ ';
        $imagelist = array();
        foreach( $images as $image ) {
            $imagelist[] = '{ src: "' . $image['home_image'] .'", element: null }';
        }
        echo implode( ', ', $imagelist);
        echo ' ]; ';
        ?>
        if ( imgList ) {
            var settings = {
                imageList: imgList,
                transitionDelay: 6000,
                transitionDuration: 1000,
                autoAdvance: false
            };
            if ( Modernizr.mq( 'only screen and (max-width: 480px)' ) ) {
                settings.transitionDelay = 3000;
            }
            slideshow = $( '.slideshow' ).sdslideshow( settings );
        }

        if ( slideshow !== null ) {
            slideshow_instance = slideshow.data( 'instance' );

            $( '.portfolio-prev' ).click( function() {
                slideshow_instance.showPreviousImage( 'slideright' );
            } );
            $( '.portfolio-next' ).click( function() {
                slideshow_instance.showNextImage( 'slideleft' );
            } );
        }
        <?php
    }
    ?>
} );
</script>

<?php get_template_part( 'footer', 'bare' ); ?>