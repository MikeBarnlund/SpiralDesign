<?php

get_header();

the_post();

?>

<div class="portfolio-page">
    <table>
        <tr>
            <td class="portfolio-nav-container nav-left">
                <a></a>
            </td>
            <td class="slideshow"></td>
            <td class="portfolio-nav-container nav-right">
                <a></a>
            </td>
        </tr>
    </table>
</div>

<nav class="portfolio-sections container tk-primary clearfix">
    <a href="/personal"<?php echo is_single( 'personal' ) ? ' class="current"' : ''; ?>>Personal</a>
    <a href="/commercial"<?php echo is_single( 'commercial' ) ? ' class="current"' : ''; ?>>Commercial</a>
    <a href="/film"<?php echo is_single( 'film' ) ? ' class="current"' : ''; ?>>Film</a>
</nav>

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