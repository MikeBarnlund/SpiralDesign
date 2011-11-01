<?php
/**
 * Custom Post Types, etc.
 * @author Mike Barnlund <mike@spiraldesign.ca>
*/

/* ================= Ajax Handling ================ */

function ajax_call() {
	$post_id = $_POST[ 'post_id' ];

	$query = 'p=' . $post_id;
	$queryObject = new WP_Query($query);

	// The Loop...
	if ( $queryObject->have_posts() ) {
		while ( $queryObject->have_posts() ) {
			$queryObject->the_post();
			get_template_part( 'post' );
		}
	}

	die();
}
/* ================= Menu Support ================= */

add_theme_support( 'menus' );

add_theme_support( 'admin-bar', array( 'callback' => '__return_false') );

add_action( 'wp_ajax_ajax_call', 'ajax_call' );
add_action( 'wp_ajax_nopriv_ajax_call', 'ajax_call' );