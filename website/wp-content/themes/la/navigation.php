<nav>
    <?php
    $navitem1 = null;
    $navitem2 = null;
    if ( is_home() || is_front_page() ) {
        $navitem1 = array ( 'title' => 'Portfolio', 'url' => '/lai-portfolio' );
        $navitem2 = array ( 'title' => 'Contact', 'url' => '/contact' );
    } else if ( is_page( 'contact' ) ) {
        $navitem1 = array ( 'title' => 'Home', 'url' => '/' );
        $navitem2 = array ( 'title' => 'Portfolio', 'url' => '/lai-portfolio' );
    }
    ?>
    <div class="nav-item"><a href="<?php echo $navitem1['url']; ?>"><?php echo $navitem1['title']; ?></a></div>
    <div class="portfolio-nav clearfix">
        <a class="portfolio-prev"><img src="<?php bloginfo( 'template_url' ) ?>/assets/img/nav-left.png" /></a>
        <img class="logo" src="<?php bloginfo( 'template_url' ) ?>/assets/img/logo.png" />
        <a class="portfolio-next"><img src="<?php bloginfo( 'template_url' ) ?>/assets/img/nav-right.png" /></a>
    </div>
    <div class="nav-item"><a href="<?php echo $navitem2['url']; ?>"><?php echo $navitem2['title']; ?></a></div>
</nav>
<?php get_template_part( 'redbar' ); ?>