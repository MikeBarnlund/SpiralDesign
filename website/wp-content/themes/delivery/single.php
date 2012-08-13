<?php

get_header();

the_post();

?>

<div class="content">
	<?php if ( get_the_ID() ) {
		get_template_part( 'post' );
	} ?>
</div>

<?php

get_footer();

?>