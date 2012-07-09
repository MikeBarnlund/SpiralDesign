<div class="share">
	<?php
	$tinyurl = getTinyUrl( get_permalink() );
	$message = '"' . get_the_title() . '" on ' . get_bloginfo( 'name' );
	$message = urlencode( $message );
	?>
	<span><a id="tweet_button" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo $message; ?>&url=<?php echo urlencode( $tinyurl ); ?>">Twitter</a></span>
	<span><a id="fb_button" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>">Facebook</a></span>
</div>