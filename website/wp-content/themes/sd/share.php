<div class="share">
	<?php
	$message = '"' . get_the_title() . '" on ' . get_bloginfo( 'name' );
	$twitter_message = $message . ' - ' . getTinyUrl( get_permalink() );
	$message = urlencode( $message );
	$twitter_message = urlencode( $twitter_message );
	?>
	<span><a id="tweet_button" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo $twitter_message; ?>&url=<?php echo urlencode( get_permalink() ); ?>">Twitter</a></span>
	<span><a id="fb_button" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>">Facebook</a></span>
</div>