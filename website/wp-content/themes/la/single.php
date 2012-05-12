<?php

get_header();

$category = get_the_category();
$slug = ( $category[0]->slug ) ? $category[0]->slug : 'uncategorized';
$name = ( $category[0]->name ) ? $category[0]->name : 'uncategorized';

?>
<div class="single-post">
    <div class="logo logo-full <?php echo $slug; ?>">
        <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/tcd-logo-post.png" />
        <div class="category-label"><?php echo $name; ?></div>
        <div class="archive-label tk-myriad-pro"><img src="<?php bloginfo( 'template_url' ) ?>/assets/img/archive-label-bg.png">Archive</div>
        <div class="logo-bottom"></div>
    </div>
    <?php

    /* Main Loop */

    while ( have_posts() ) :
    	the_post();
    	get_template_part( 'post' );
    endwhile;

    ?>
    <div class="post-navigation">
        <div class="next-prev">
            <a class="previous-post">Previous</a>
            <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/post-navigation-divider.png" />
            <a class="next-post">Next</a>
        </div>
        <div class="post-names">

        </div>
    </div>
    <?php

    //next_post_link( format, link, in_same_cat, excluded_categories );

    previous_post_link( '%link', __( '<span class="meta-nav">←</span> Previous', 'twentyeleven' ) );
    echo ' | ';
    next_post_link( '%link', __( 'Next <span class="meta-nav">→</span>', 'twentyeleven' ) );

    ?>
</div>
<?php

get_footer();

get_template_part( 'footer', 'bare' );