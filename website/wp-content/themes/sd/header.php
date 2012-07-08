<?php get_template_part( 'header', 'bare') ; ?>
	<div id="page">
		<header>
			<div id="logo"></div>
			<nav>
				<?php wp_nav_menu( array( 'walker' => new SH_Last_Walker(), 'depth' => 0 ) ); ?>
			</nav>
		</header>
		<div role="main">