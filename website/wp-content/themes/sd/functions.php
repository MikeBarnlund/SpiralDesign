<?php
/**
 * Custom Post Types, etc.
 * @author Mike Barnlund <mike@spiraldesign.ca>
*/

/* ================= Menu Support ================= */

//add_theme_support( 'menus' );

// ================= Add Custom Post Types ==================

add_action( 'init', 'create_post_type' );

function create_post_type() {
	register_post_type( 'promotion',
		array(
			'labels' => array(
				'name' => __( 'Promotions' ),
				'singular_name' => __( 'Promotion' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}