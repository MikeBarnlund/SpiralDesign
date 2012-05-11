<div class="info">
    <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/info-inactive.png" />
</div>
<nav>
    <?php
    $navitem1 = null;
    $navitem2 = null;
    if ( is_home() || is_front_page() ) {
        $navitem1 = array ( 'title' => 'Portfolio', 'url' => '/portfolio' );
        $navitem2 = array ( 'title' => 'Contact', 'url' => '/contact' );
    } else if ( is_page( 'contact' ) ) {
        $navitem1 = array ( 'title' => 'Home', 'url' => '/' );
        $navitem2 = array ( 'title' => 'Portfolio', 'url' => '/portfolio' );
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
<div class="redbar">
    <div class="info-logo"></div>
    <a target="_blank" href="http://www.twitter.com" class="twitter"></a>
    <a target="_blank" href="mailto:someone@theinternet.com" class="mail"></a>
</div>