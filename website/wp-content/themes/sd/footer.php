  	</div>
	<footer class="clearfix">
		<div class="contact">
			<a class="phone" href="tel:14034527005">+1 (403) 452 7005</a>
			<a class="email" href="mailto:info@buccaneercoatings.com">info@buccaneercoatings.com</a>
			<div class="divider">&nbsp;</div>
			<div class="logo">
				<a href="/"><img src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/footer-logo.png"></a>
				<a href="/legal" class="legal">Legal &amp; Privacy Policy</a>
			</div>
		</div>
		<?php wp_nav_menu( array( 'menu' => 'Footer Navigation' ) ); ?>
	</footer>
</div>
<?php get_template_part( 'footer', 'bare' ); ?>