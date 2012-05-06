<?php

/*
Template Name: Home
*/

get_header();

the_post();

?>

<div>
    <article>
        <?php if ( get_the_ID() ) { ?>

        <div class="slideshow">
            <?php
            $images = get_field( 'home_images' );
            if ( !empty( $images ) ) {
                echo '<ul>';
                foreach( $images as $image ) {
                    echo '<li><img src="' . $image . '" /></li>';
                }
                echo '</ul>';
            }
            ?>
        </div>

        <?php } ?>
        <?php edit_post_link( __( 'Edit', 'sdbase' ) ); ?>
    </article>

</div>

<?php

get_footer();

?>