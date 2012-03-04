<div class="share">
	<?php
	$title = urlencode( get_the_title() );
	?>
	<a title="Share on Twitter" target="_blank" href="http://twitter.com/home?status=Contribute%20to%20the%20<?php echo $title; ?>%20-%20<?php the_permalink(); ?>">
		<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/twitter_16.png"/>Share on Twitter
	</a>
	<a title="Share on Facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo $title; ?>">
		<img src="<?php bloginfo( 'template_url' ); ?>/assets/img/facebook_16.png"/>Share on Facebook
	</a>
</div>