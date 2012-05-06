<?php

/*
Template Name: Home
*/

get_header();

the_post();

?>



<div class="container">
    <article>
        <?php if ( get_the_ID() ) { ?>

        <div class="slideshow">
            <ul>

            </ul>
        </div>

        <?php } ?>
        <?php edit_post_link( __( 'Edit', 'sdbase' ) ); ?>
    </article>

</div>

<?php get_footer(); ?>

<script>
$( document ).ready( function() {
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
        echo 'console.log( imgList.length );';
    }
    ?>
} );
</script>

<?php get_template_part( 'footer', 'bare' ); ?>