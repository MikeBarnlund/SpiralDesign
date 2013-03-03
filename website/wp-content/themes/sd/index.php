<?php

get_header();

?>

<div class="content">
	<h1 class="entry-title"><?php wp_title( '' ); ?></h1>
	<?php
	get_template_part( 'post', 'list' );
	?>
</div>

<div id="container">
	<button>Load</button>
	<ul id="list"></ul>
</div>

<div id="list-template">
	<li></li>
</div>

<a href="http://spiraldesign.ca/foo/test">Test Foo</a>

<?php

get_footer();

?>