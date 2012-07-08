<?php
/**
 * Custom Post Types, etc.
 * @author Mike Barnlund <mike@spiraldesign.ca>
*/

/* ================= Menu Support ================= */

add_theme_support( 'menus' );

// ================= Add Custom Post Types ==================

add_action( 'init', 'create_post_type' );

function create_post_type() {
	register_post_type( 'sampleposttype',
		array(
			'labels' => array(
				'name' => __( 'Sample Custom Posts' ),
				'singular_name' => __( 'Sample Custom Post' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}

// Ondemand function to generate tinyurl
function getTinyUrl($url) {
     $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
     return $tinyurl;
}