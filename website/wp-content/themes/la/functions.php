<?php
/**
 * Custom Post Types, etc.
 * @author Mike Barnlund <mike@spiraldesign.ca>
*/

// ================= Add Custom Post Types ==================

add_action( 'init', 'create_post_type' );

function create_post_type() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolios' ),
				'singular_name' => __( 'Portfolio' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}