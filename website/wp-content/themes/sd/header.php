<?php get_template_part( 'header', 'bare') ; ?>
	<div id="page">
		<header>
			<img id="logo" src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/logo.png" />
			<nav>
				<?php wp_nav_menu( array( 'walker' => new SH_Last_Walker(), 'depth' => 0 ) ); ?>
			</nav>
		</header>
		<div id="content" role="main">