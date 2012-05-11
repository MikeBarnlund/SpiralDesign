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
    <?php get_template_part( 'navigation' ); ?>
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