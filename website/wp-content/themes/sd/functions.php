<?php
/**
 * Custom Post Types, etc.
 * @author Mike Barnlund <mike@spiraldesign.ca>
*/

// Menu Support ===============================================================

add_theme_support( 'menus' );

// Add Custom Post Types ======================================================

add_action( 'init', 'create_post_type' );

function create_post_type() {
	register_post_type( 'visionboard',
		array(
			'labels' => array(
				'name' => __( 'Vision Board' ),
				'singular_name' => __( 'Vision Board' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
	register_post_type( 'productcanvas',
		array(
			'labels' => array(
				'name' => __( 'Product Canvas' ),
				'singular_name' => __( 'Product Canvas' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
	register_post_type( 'persona',
		array(
			'labels' => array(
				'name' => __( 'Persona' ),
				'singular_name' => __( 'Persona' )
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