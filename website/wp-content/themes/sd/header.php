<?php get_template_part( 'header', 'bare') ; ?>
	<div id="page">
		<header>
			<nav>
				<?php wp_nav_menu( array( 'walker' => new SH_Last_Walker(), 'depth' => 0 ) ); ?>
				<?php /*get_search_form();*/ ?>
			</nav>
			<img id="logo" src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/img/logo.png" />
		</header>
		<div id="content" role="main">