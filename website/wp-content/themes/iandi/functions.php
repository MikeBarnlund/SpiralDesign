<?php
/**
 * Custom Post Types, etc.
 * @author Mike Barnlund <mike@spiraldesign.ca>
*/

/* ================= Menu Support ================= */

add_theme_support( 'menus' );

add_theme_support( 'admin-bar', array( 'callback' => '__return_false') );

/* ================ Disable Wordpress's Horrible Auto Formatting ============== */

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

// ================= Add Custom Post Types ==================

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'interview',
		array(
			'labels' => array(
				'name' => __( 'Interviews' ),
				'singular_name' => __( 'Interview' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}

// ================ Custom Password Form ==================

add_filter( 'the_password_form', 'custom_password_form' );
function custom_password_form() {
	remove_filter('the_content', 'wpautop');
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="password-protected">' .
		'<img src="' . get_bloginfo( 'template_url' ) . '/assets/img/protected.png" />' .
		'<form action="' . get_option('siteurl') . '/wp-pass.php" method="post">' .
		'<p>Your Interview is password protected. To view, please enter the password supplied to you by I&I.</p>' .
		'<input class="form-text" name="post_password" id="' . $label . '" type="password" size="20" />' .
		'<button class="form-button" type="submit" name="Submit">Submit <em>&gt;&gt;</em></button>' .
		'</form>' .
		'</div>';
	return $o;
}