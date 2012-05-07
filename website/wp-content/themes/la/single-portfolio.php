<?php

get_header();

the_post();

?>

<div class="container portfolio-page">
    <article>
        <div class="slideshow"></div>
    </article>

    <nav class="tk-primary clearfix">
        <a href="/personal"<?php echo is_single( 'personal' ) ? ' class="current"' : ''; ?>>Personal</a>
        <a href="/commercial"<?php echo is_single( 'commercial' ) ? ' class="current"' : ''; ?>>Commercial</a>
        <a href="/film"<?php echo is_single( 'film' ) ? ' class="current"' : ''; ?>>Film</a>
    </nav>
</div>

<?php get_footer(); ?>

<script src="<?php bloginfo( 'template_url' ) ?>/assets/js/libs/jquery.sdslideshow.js"></script>

<script>
$( document ).ready( function() {
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
            $( '.slideshow' ).sdslideshow( { imageList: imgList, transitionDelay: 6000, transitionDuration: 1000 } );
        }
        <?php
    }
    ?>
} );
</script>

<?php get_template_part( 'footer', 'bare' ); ?>