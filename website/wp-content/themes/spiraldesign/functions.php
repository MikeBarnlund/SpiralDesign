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

// ================= Configure Promotion Post Type ==================

add_action( 'add_meta_boxes', 'add_grid_priority_metabox' );


// Add the Promotion Meta Boxes
function add_grid_priority_metabox() {
    add_meta_box('wpt_grid_priority', 'Grid Priority', 'wpt_grid_priority', 'post', 'side', 'default');
}

// The Promotion Price Metabox
function wpt_grid_priority() {
    global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="prioritymeta_noncename" id="prioritymeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    // Get the location data if its already been entered
    $gridpriority = get_post_meta($post->ID, '_gridpriority', true);
    // Echo out the field
    echo '<input type="text" name="_gridpriority" value="' . $gridpriority  . '" class="widefat" />';
}

// Save the Metabox Data
function wpt_save_grid_priority_meta($post_id, $post) {
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['prioritymeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    $promotion_meta['_gridpriority'] = $_POST['_gridpriority'];
    // Add values of $promotion_meta as custom fields
    foreach ($promotion_meta as $key => $value) { // Cycle through the $promotion_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'wpt_save_grid_priority_meta', 1, 2);