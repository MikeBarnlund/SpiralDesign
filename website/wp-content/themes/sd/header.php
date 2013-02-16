<?php get_template_part( 'header', 'bare') ; ?>
	<div id="page">
		<header>
			<a href="/"><img id="logo" src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/logo.png" /></a>
			<nav>
				<?php wp_nav_menu( array( 'walker' => new SH_Last_Walker(), 'depth' => 0 ) ); ?>
			</nav>
		</header>
		<div id="content" role="main">