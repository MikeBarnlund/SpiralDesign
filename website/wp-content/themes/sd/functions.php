<?php
/**
 * Custom Post Types, etc.
 * @author Mike Barnlund <mike@spiraldesign.ca>
*/

// Load JS ====================================================================

function loadBackbone() {
	wp_enqueue_script('backbone');
}
add_action('wp_enqueue_scripts', 'loadBackbone');

// Menu Support ===============================================================

add_theme_support( 'menus' );

// Add Custom Post Types ======================================================

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

// Custom Walker for Menus ====================================================

class SH_Last_Walker extends Walker_Nav_Menu{

   function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

        $id_field = $this->db_fields['id'];

       //If the current element has children, add class 'sub-menu'
       if( isset($children_elements[$element->$id_field]) ) { 
            $classes = empty( $element->classes ) ? array() : (array) $element->classes;
            $classes[] = 'has-sub-menu';
            $element->classes =$classes;
       }
        // We don't want to do anything at the 'top level'.
        if( 0 == $depth )
            return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

        //Get the siblings of the current element
        $parent_id_field = $this->db_fields['parent'];      
        $parent_id = $element->$parent_id_field;
        $siblings = $children_elements[ $parent_id ] ;

        //No Siblings?? 
        if( ! is_array($siblings) )
            return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

        //Get the 'last' of the siblings.
        $last_child = array_pop($siblings);
        $id_field = $this->db_fields['id'];

		//If current element is the last of the siblings, add class 'last'
        if( $element->$id_field == $last_child->$id_field ){
            $classes = empty( $element->classes ) ? array() : (array) $element->classes;
            $classes[] = 'last';
            $element->classes = $classes;
        }

        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}

// AJAX Stuff =================================================================

add_action('wp_ajax_nopriv_do_ajax', 'our_ajax_function');
add_action('wp_ajax_do_ajax', 'our_ajax_function');
function our_ajax_function(){
 
	// the first part is a SWTICHBOARD that fires specific functions
	// according to the value of Query Var 'fn'

	switch( $_REQUEST['fn'] ){
		case 'get_latest_posts':
			$output = ajax_get_latest_posts( $_REQUEST[ 'count' ] );
			break;
		case 'get_post_by_slug':
			$output = ajax_get_post( $_REQUEST[ 'slug' ] );
			break;
		default:
			$output = 'No function specified, check your jQuery.ajax() call';
			break;
	}

	// at this point, $output contains some sort of valuable data!
	// Now, convert $output to JSON and echo it to the browser 
	// That way, we can recapture it with jQuery and run our success function

	$output = json_encode( $output );
	if( is_array( $output ) ){
		print_r( $output );   
	}
	else {
		echo $output;
	}
	die;
}

function ajax_get_latest_posts($count){
	$posts = get_posts( array( 'numberposts' => $count ) );
	return $posts;
}

function ajax_get_post( $slug ) {
	$args = array( 'name' => $slug, 'numberposts' => 1 );
	$post = get_posts( $args );
	return $post;
}
