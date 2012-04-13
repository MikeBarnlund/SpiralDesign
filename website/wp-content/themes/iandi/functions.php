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

// =============== Custom Adjacent Post Link Fetching ==================


/**
 * Retrieve adjacent available interview.
 *
 */
function get_adjacent_available_post( $in_same_cat = false, $excluded_categories = '', $previous = true ) {
	global $post, $wpdb;

	if ( empty( $post ) )
		return null;

	$current_post_date = $post->post_date;

	$join = $wpdb->prepare( "INNER JOIN $wpdb->postmeta wpostmeta ON wposts.ID = wpostmeta.post_id" );
	$posts_in_ex_cats_sql = '';

	$adjacent = $previous ? 'previous' : 'next';
	$op = $previous ? '<' : '>';
	$order = $previous ? 'DESC' : 'ASC';

	$join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
	$where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE wposts.post_date $op %s AND wposts.post_type = %s AND wposts.post_status = 'publish' AND wpostmeta.meta_key = 'state' AND wpostmeta.meta_value IN ( 'active', 'featured' ) ", $current_post_date, $post->post_type), $in_same_cat, $excluded_categories );
	$sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY wposts.post_date $order LIMIT 1" );

	$query = "SELECT wposts.*, wpostmeta.meta_value FROM $wpdb->posts wposts $join $where $sort";
	//echo '<br/><strong>Query:</strong> ' . $query;
	$query_key = 'adjacent_post_' . md5($query);
	$result = wp_cache_get($query_key, 'counts');
	if ( false !== $result )
		return $result;

	$result = $wpdb->get_row("SELECT wposts.*, wpostmeta.meta_value FROM $wpdb->posts wposts $join $where $sort");
	if ( null === $result )
		$result = '';

	wp_cache_set($query_key, $result, 'counts');
	return $result;
}