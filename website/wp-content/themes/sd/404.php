<?php get_header(); ?>

<div id="post-0" class="post error404 not-found">
	<h1 class="entry-title"><?php _e( 'Not Found', 'sdbase' ); ?></h1>
	<div class="entry-content">
		<p><?php _e( 'Sorry, that page doesn\'t exist here. ', 'sdbase' ); ?></p>
	</div>
</div>

<?php 

get_footer(); 

get_template_part( 'body', 'close' );

?>