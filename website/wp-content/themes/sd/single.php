<?php

get_header();

the_post();

?>

<div class="main clearfix">
	<div class="content">
		<?php if ( get_the_ID() ) {
			get_template_part( 'post' );
		} ?>
	</div>
</div>

<?php

get_footer();

get_template_part( 'body', 'close' );

?>