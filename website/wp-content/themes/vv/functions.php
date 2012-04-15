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
add_action( 'init', 'build_taxonomies', 0 );

function create_post_type() {
	register_post_type( 'listing',
		array(
			'labels' => array(
				'name' => __( 'Listings' ),
				'singular_name' => __( 'Listing' )
			),
		'public' => true,
		'has_archive' => true
		)
	);
}

function build_taxonomies() {
	register_taxonomy(
		'listing_type',
		'listing',
		array(
			'labels' => array(
				'name' => 'Listing Types',
				'singular_name' => 'Listing Type',
				'search_items' => 'Search Listing Types',
				'add_new_item' => 'Add New Listing Type',
				'new_item_name' => 'New Listing Type',
				'parent_item' => 'Parent Listing Type'
			),
			'hierarchical' => true
		)
	);
}