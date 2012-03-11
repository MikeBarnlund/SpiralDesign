		</div> <!-- end #contentbody .bodycontainer -->
	</div> <!-- end #contentbody -->

	<div id="footer">
		<div class="container">
			<a class="twitter" target="_blank" href="https://www.twitter.com/indandint"></a>
			<a class="email" href="mailto:asher@industryandinterest.com"></a>
			<a class="vv" target="_blank" href="http://vauntvisual.com"></a>
			<span class="copyright"><em>&copy;</em> COPYRIGHT 2012 INDUSTRY AND INTEREST.  ALL RIGHTS RESERVED.  I&I IS A VAUNT VISUAL PROJECT.</span>
			<?php
			/*
			if current page == home
				echo link to posts in .footer-navigation
			else
			*/
			if ( is_front_page() ) { ?>
				<div class="footer-navigation">
					<a href="/posts" title="See All Posts">See All <em>&gt;&gt;</em></a>
				</div>
			<?php } else {
				echo '<div class="footer-navigation">';
				next_posts_link(__( 'Next <em>&gt;&gt;</em>', 'iandi' ));
				previous_posts_link(__( '<em>&lt;&lt;</em> Prev', 'iandi' ));
				echo '</div>';
			} ?>
		</div>
	</div>
<?php get_template_part( 'footer', 'bare' ); ?>