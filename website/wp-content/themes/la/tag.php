<?php

get_header();

?>

<div class="home-page">
    <div class="logo logo-full <?php echo $slug; ?>">
        <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/tcd-logo-post.png" />
        <div class="tag-label"><?php single_tag_title(); ?></div>
        <a href="/" class="home-link"></a>
        <div class="logo-bottom"></div>
    </div>
    <?php

    /* Main Loop */

    while ( have_posts() ) :
    	the_post();
    	get_template_part( 'post' );
    endwhile;

    ?>

    <?php /* Display navigation to next/previous pages when applicable */ ?>
    <?php
    if (  $wp_query->max_num_pages > 1 ) {
        $next_link = get_next_posts_link();
        $prev_link = get_previous_posts_link();
        ?>
		<div class="post-page-navigation">
    	    <?php
                echo( !empty( $prev_link ) ) ? '<div class="next-page">' . $prev_link . '</div>' : '<div class="post-placeholder"></div>';
                echo '<img src="' . get_bloginfo( 'template_url' ) . '/assets/img/post-navigation-divider.png" />';
                echo( !empty( $next_link ) ) ? '<div class="prev-page">' . $next_link . '</div>' : '<div class="post-placeholder"></div>';
            ?>
		</div>
    <?php } ?>

</div>

<?php

get_footer();

get_template_part( 'footer', 'bare' );