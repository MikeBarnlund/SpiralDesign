<?php
get_template_part( 'header', 'bare' ) ;
$categories = get_categories();
$cat_links = array();

foreach ( $categories as $category ) {
    // $args = array(
    //     'cat' => $category->cat_ID,
    //     'posts_per_page' => 1
    // );
    //
    // // The Query
    // $the_query = new WP_Query( $args );
    //
    // // The Loop
    // while ( $the_query->have_posts() ) : $the_query->the_post();
    //     $cat_links[] = '<li><a class="' . $category->slug . '" href="' . get_permalink( get_the_ID() ) . '" />' . str_replace( ' ', '&nbsp;', $category->name ) . '</a></li>';
    // endwhile;

    // The Loop

    $cat_links[] = '<li><a class="' . $category->slug . '" href="/' . $category->slug . '" />' . str_replace( ' ', '&nbsp;', $category->name ) . '</a></li>';
}

// Reset Post Data
wp_reset_postdata();

?>
	<div id="page">
	    <header class="clearfix">
            <nav class="main">
                <a class="home-link" href="/">Main</a>
                <a class="categories">
                    Categories
                </a>
                <a href="/about">About</a>
                <ul class="cat-dropdown">
                    <?php
                        echo implode( $cat_links );
                    ?>
                    <li class="searchitem"><?php get_search_form(); ?></li>
                </ul>
            </nav>
            <nav class="social">
                <a target="_blank" title="the10centdesigner on Instagram" href="http://ink361.com/#/users/656295/photos" class="instagram"></a>
                <a target="_blank" title="the10centdesigner on Twitter" href="https://twitter.com/#!/designertweets" class="twitter"></a>
                <a target="_blank" title="the10centdesigner on Flickr" href="http://www.flickr.com/photos/theproletariatdesigner/" class="flickr"></a>
            </nav>
            <div class="header-rt"></div>
        </header>
		<div role="main">