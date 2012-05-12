<?php

get_header();

?>

<div class="home-page">
    <div class="logo logo-full">
        <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/tcd-logo.png" />
        <div class="logo-bottom"></div>
    </div>
    <?php

    /* Main Loop */

    while ( have_posts() ) :
    	the_post();
    	get_template_part( 'post' );
    endwhile;

    ?>

</div>

<?php

get_footer();

get_template_part( 'footer', 'bare' );