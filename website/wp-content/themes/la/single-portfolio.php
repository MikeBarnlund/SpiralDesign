<?php
get_header();
the_post();
?>

<article>
    <?php if ( get_the_ID() ) { ?>
        <div class="portfolio-nav-left"></div>
        <div class="slideshow">
            <ul>
                <?php
                $images = get_field( 'portfolio_images' );
                foreach( $images as $image ) {
                    echo '<li><img src="' . $image . '" /></li>';
                }
                ?>
            </ul>
        </div>
        <div class="portfolio-nav-right"></div>
    <?php } ?>
    <?php edit_post_link( __( 'Edit', 'sdbase' ) ); ?>
</article>

<nav>
    <a href="/personal"<?php echo is_single( 'personal' ) ? ' class="current"' : ''; ?>>Personal</a>
    <a href="/commercial"<?php echo is_single( 'commercial' ) ? ' class="current"' : ''; ?>>Commercial</a>
    <a href="/film"<?php echo is_single( 'film' ) ? ' class="current"' : ''; ?>>Film</a>
</nav>

<?php

get_footer();

?>