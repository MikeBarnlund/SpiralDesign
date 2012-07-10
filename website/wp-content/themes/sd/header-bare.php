<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta name="description" content="<?php echo bloginfo( 'description' ); ?>" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/css/theme.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php bloginfo( 'template_url' ) ?>/assets/img/favicon.ico" />

	<script src="<?php bloginfo( 'template_url' ) ?>/assets/js/libs/modernizr-2.5.3.min.js"></script>
	<script type="text/javascript" src="http://use.typekit.com/orc2pgb.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<title>
		<?php

		if ( is_single() ) {
			single_post_title();
		}
		elseif ( is_home() || is_front_page() ) {
			bloginfo( 'description' );
			print ' | ';
			bloginfo( 'name' );
		}
		elseif ( is_page() ) {
			bloginfo( 'name' );
			print ' | ';
			single_post_title( '' );
		}
		elseif ( is_search() ) {
			bloginfo( 'name' );
			print ' | Search results for ' . esc_html( $s );
		}
		elseif ( is_category() ) {
			bloginfo( 'name' );
			print ' | ';
			single_cat_title();
		}
		elseif ( is_404() ) {
			bloginfo( 'name' );
			print ' | Not Found';
		}
		else { bloginfo( 'name' ); }

		?>
	</title>

	<?php wp_head(); ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

</head>
<body>