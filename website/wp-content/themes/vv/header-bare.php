<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head profile="http://gmpg.org/xfn/11">
	<meta name="description" content="<?php echo bloginfo( 'description' ); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ) ?>/assets/css/reset.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/css/base.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php bloginfo( 'template_url' ) ?>/favicon.ico" />

	<!--[if lte IE 8]>
		<link rel="stylesheet" href="<?php bloginfo( 'template_url' ) ?>/assets/css/ie.css" type="text/css" media="screen" charset="utf-8" />
	<![endif]-->

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
		elseif ( is_404() ) {
			bloginfo( 'name' );
			print ' | Not Found';
		}
		else { bloginfo( 'name' ); }

		?>
	</title>

	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>

	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'lovecalgary' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

	<!-- Load Global Scripts -->

	<script src="<?php bloginfo( 'template_url' ) ?>/assets/js/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>

	<!-- Load Theme Scripts -->
	<script src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/js/theme.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>