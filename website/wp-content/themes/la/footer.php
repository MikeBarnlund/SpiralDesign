  	</div> <!-- /role=main -->
</div> <!-- /#page -->
<footer class="tk-primary clearfix">
    <!-- <div class="footer-nav">
        <div class="social-label"></div>
        <nav>
            <?php
            $is_portfolio_page = is_single( 'personal' ) || is_single( 'commercial' ) || is_single( 'film' ) || is_page( 'portfolio-home' );
            ?>
            <a href="/" title="Home"<?php echo is_home() || is_front_page() ? ' class="current"' : ''; ?>>Home</a>
            <a href="/portfolio-home" title="Portfolio"<?php echo $is_portfolio_page === true ? ' class="current"' : ''; ?>>Portfolio</a>
            <a href="/contact" title="Contact"<?php echo is_page( 'contact' ) ? ' class="current"' : ''; ?>>Contact</a>
        </nav>
        <div class="social">
            <a target="_blank" class="twitter" rel="Twitter" title="Lori Andrews Photography on Twitter" href="https://twitter.com/#!/designertweets"></a>
            <a target="_blank" class="flickr" rel="Flickr" title="Lori Andrews Photography on Flickr" href="http://www.flickr.com/photos/theproletariatdesigner/"></a>
            <a target="_blank" class="getty" rel="Getty Images" title="Lori Andrews Photography on Getty Images" href="http://www.gettyimages.ca/Search/Search.aspx?assettype=image&family=creative&artist=Lori+Andrews&Language=en-US"></a>
        </div>
    </div> -->
    <div class="footer-bottom">
        <div class="copyright"><em>&copy;</em> 2012 LORI ANDREWS PHOTOGRAPHY <em>|</em> Site by <a target="_blank" href="http://vauntvisual.com">VV</a></div>
        <div class="nav-arrow"></div>
    </div>
</footer>

<!-- Load Global Scripts -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo( 'template_url' ) ?>/assets/js/libs/jquery-1.7.2.min.js"><\/script>')</script>

<!-- Load Theme Scripts -->
<script src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/js/script.js"></script>