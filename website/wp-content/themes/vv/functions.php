<?php
/**
 * Custom Post Types, etc.
 * @author Mike Barnlund <mike@spiraldesign.ca>
*/

/* ================= Menu Support ================= */

add_theme_support( 'menus' );

add_theme_support( 'admin-bar', array( 'callback' => '__return_false') );

// ================= Add Custom Post Types ==================

add_action( 'init', 'create_post_type' );

function create_post_type() {
	register_post_type( 'listings',
		array(
			'labels' => array(
				'name' => __( 'Listings' ),
				'singular_name' => __( 'Listing' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}