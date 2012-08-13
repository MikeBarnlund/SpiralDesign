<?php

get_header();

?>

<div class="content">
	<h1 class="entry-title"><?php wp_title( '' ); ?></h1>
	<?php
	get_template_part( 'post', 'list' );
	?>
</div>

<?php

get_footer();

?>