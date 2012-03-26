		</div> <!-- end #contentbody .bodycontainer -->
	</div> <!-- end #contentbody -->

	<div id="footer">
		<div class="container">
			<a class="twitter" target="_blank" href="https://www.twitter.com/indandint"></a>
			<a class="email" href="mailto:asher@industryandinterest.com"></a>
			<a class="vv" target="_blank" href="http://vauntvisual.com"></a>
			<span class="copyright"><em>&copy;</em> COPYRIGHT 2012 INDUSTRY AND INTEREST.  ALL RIGHTS RESERVED.  I&I IS A <a class="copyright-link" target="_blank" href="http://vauntvisual.com">VAUNT VISUAL</a> PROJECT.</span>
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
			<?php } else if ( is_single() ) {
				echo '<div class="footer-navigation single-post">';
				$title_maxlen = 28;

				$next_post = get_adjacent_post( false, '', false );
				$next_state = get_field( 'state', $next_post->ID );

				$previous_post = get_adjacent_post( false, '', true );
				$previous_state = get_field( 'state', $previous_post->ID );

				if ( $next_state === 'upcoming' || $next_state === 'upnext' ) $next_post = '';
				if ( $previous_state === 'upcoming' || $previous_state === 'upnext' ) $previous_post = '';

				echo ( !empty( $previous_post ) )
					?	'<a href="' . get_permalink( $previous_post->ID ) . '" class="previous-post"><em>&lt;&lt;</em> ' .
						( strlen( $previous_post->post_title ) > $title_maxlen
							? substr( $previous_post->post_title, 0, $title_maxlen ) . '...'
							: $previous_post->post_title ) .
						'</a>'
					: '';
				echo ( !empty( $next_post ) )
					?	'<a href="' . get_permalink( $next_post->ID ) . '" class="next-post">' .
						( strlen( $next_post->post_title ) > $title_maxlen
							? substr( $next_post->post_title, 0, $title_maxlen ) . '...'
							: $next_post->post_title ) .
						' <em>&gt;&gt;</em></a>'
					: '';
				echo '</div>';
			} else {
				echo '<div class="footer-navigation">';
				next_posts_link(__( 'Next <em>&gt;&gt;</em>', 'iandi' ));
				previous_posts_link(__( ' Prev', 'iandi' ));
				echo '</div>';
			} ?>
		</div>
	</div>
<?php get_template_part( 'footer', 'bare' ); ?>