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
		$title = '';
		$share_title = '';

		if ( is_single() ) {
			if ( get_post_type() === 'interview' ) {
				$title = 'Interview with ' . single_post_title( '', FALSE ). ' - ' . get_field( 'interviewee_title' );
				$share_title = $title . ' on Industry & Interest | @INDandINT';
			} else {
				$title = single_post_title( '', FALSE );
				$share_title = $title . ' | @INDandINT';
			}

		}
		elseif ( is_home() || is_front_page() ) {
			$title .= get_bloginfo( 'description' ) .
				' | ' .
				get_bloginfo( 'name' );
			$share_title = $title . ' | @INDandINT';
		}
		elseif ( is_page() ) {
			$title .= get_bloginfo( 'name' ) .
				' | ' .
				single_post_title( '', FALSE );
			$share_title = $title . ' | @INDandINT';
		}
		elseif ( is_search() ) {
			$title .= get_bloginfo( 'name' ) .
				' | Search results for ' . esc_html( $s );
			$share_title = $title . ' | @INDandINT';
		}
		elseif ( is_404() ) {
			$title .= get_bloginfo( 'name' ) .
				' | Not Found';
			$share_title = $title . ' | @INDandINT';
		}
		else {
			$title = get_bloginfo( 'name' );
			$share_title = $title . ' | @INDandINT';
		}

		echo $title;

		?>
	</title>

	<meta property="og:title" content="<?php echo $share_title; ?>" />

	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>

	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'iandi' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

	<!-- Load Global Scripts -->

	<script type="text/javascript" src="http://use.typekit.com/svm8utr.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<script src="<?php bloginfo( 'template_url' ) ?>/assets/js/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>

	<!-- Load Theme Scripts -->
	<script src="<?php bloginfo( 'stylesheet_directory' ) ?>/assets/js/theme.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>