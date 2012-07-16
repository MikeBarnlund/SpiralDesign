<?php

get_header();

?>

<div class="main with-side-image clearfix">
	<div class="content">
		<h1 class="entry-title"><?php wp_title( '' ); ?></h1>
		<?php
		get_template_part( 'post', 'list' );
		?>
	</div>
</div>
<?php

get_footer();

get_template_part( 'body', 'close' );

?>