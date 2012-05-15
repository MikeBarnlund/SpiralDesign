<?php

/*
Template Name: Portfolio Page
*/

get_header();

the_post();

?>

<div class="portfolio-page">
    <div class="slideshow-wrapper">
        <table>
            <tr>
                <td class="slideshow"></td>
            </tr>
        </table>
    <?php get_template_part( 'redbar' ); ?>
    </div>
    <div class="portfolio-navbar">
        <a href="/"><img class='logo' src="<?php bloginfo( 'template_url' ) ?>/assets/img/lai-logo-light.png" /></a>
        <div class="slideshow-nav">
            <a class="nav-left"></a>
            <a class="nav-right"></a>
        </div>
        <ul>
            <li><a href="/">Main</a></li>
            <li><a href="/lai-portfolio">Portfolio</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </div>
</div>

<?php get_footer(); ?>

<script src="<?php bloginfo( 'template_url' ) ?>/assets/js/libs/jquery.sdslideshow.js"></script>

<script>
$( document ).ready( function() {
    var slideshow = null;
    <?php
    $images = get_field( 'portfolio_images' );
    if ( !empty( $images ) ) {
        echo 'imgList = [ ';
        $imagelist = array();
        foreach( $images as $image ) {
            $imagelist[] = '{ src: "' . $image['portfolio_image'] .'", element: null }';
        }
        echo implode( ', ', $imagelist);
        echo ' ]; ';
        ?>
        if ( imgList ) {
            slideshow = $( '.slideshow' ).sdslideshow( {
                imageList: imgList,
                transitionDuration: 250,
                autoAdvance: false
            } );
        }
        <?php
    }
    ?>

    if ( slideshow !== null ) {
        slideshow_instance = slideshow.data( 'instance' );

        $( '.nav-left' ).click( function() {
            slideshow_instance.showPreviousImage( 'slideright' );
        } );
        $( '.nav-right' ).click( function() {
            slideshow_instance.showNextImage( 'slideleft' );
        } );
    }
} );
</script>

<?php get_template_part( 'footer', 'bare' ); ?>