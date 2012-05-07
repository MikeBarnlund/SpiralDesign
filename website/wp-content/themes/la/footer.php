  	</div> <!-- /role=main -->
</div> <!-- /#page -->
<footer class="tk-primary">
	<nav>
	    <?php
	    $is_portfolio_page = is_single( 'personal' ) || is_single( 'commercial' ) || is_single( 'film' ) || is_page( 'portfolio-home' );
	    ?>
		<a href="/" title="Home"<?php echo is_home() || is_front_page() ? ' class="current"' : ''; ?>>Home</a>
		<a href="/portfolio-home" title="Portfolio"<?php echo $is_portfolio_page === true ? ' class="current"' : ''; ?>>Portfolio</a>
		<a href="/contact" title="Contact"<?php echo is_page( 'contact' ) ? ' class="current"' : ''; ?>>Contact</a>
	</nav>
	<div class="copyright"><em>&copy;</em> 2012 LORI ANDREWS PHOTOGRAPHY</div>
	<div class="social">
	    <a target="_blank" class="twitter" title="Lori Andrews Photography on Twitter" href="http://www.twitter.com"></a>
	    <a target="_blank" class="flickr" title="Lori Andrews Photography on Flickr" href="http://www.flickr.com"></a>
	    <a target="_blank" class="getty" title="Lori Andrews Photography on Getty Images" href="http://www.getty.com"></a>
	</div>
</footer>

<!-- Load Global Scripts -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
<script>window.jQuery || document.write('<script src="<?php bloginfo( 'template_url' ) ?>/assets/js/libs/jquery-1.7.2.min.js"><\/script>')</script>

<!-- Load Theme Scripts -->
<script src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/js/script.js"></script>