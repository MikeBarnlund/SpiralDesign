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

// ==================== Better Metabox Setup ======================

define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
define('MY_THEME_PATH','/' . substr(MY_THEME_FOLDER,stripos(MY_THEME_FOLDER,'wp-content')));

add_action('admin_init','my_meta_init');

function my_meta_init()
{
    // review the function reference for parameter details
    // http://codex.wordpress.org/Function_Reference/wp_enqueue_script
    // http://codex.wordpress.org/Function_Reference/wp_enqueue_style

    //wp_enqueue_script('my_meta_js', MY_THEME_PATH . '/custom/meta.js', array('jquery'));
    wp_enqueue_style('my_meta_css', MY_THEME_PATH . '/assets/css/meta.css');

    // review the function reference for parameter details
    // http://codex.wordpress.org/Function_Reference/add_meta_box

    // add a meta box for each of the wordpress page types: posts and pages
    foreach (array('post','page') as $type)
    {
        add_meta_box('my_all_meta', 'My Custom Meta Box', 'my_meta_setup', $type, 'normal', 'high');
    }

    // add a callback function to save any data a user enters in
    add_action('save_post','my_meta_save');
}

function my_meta_setup()
{
    global $post;

    // using an underscore, prevents the meta variable
    // from showing up in the custom fields section
    $meta = get_post_meta($post->ID,'_my_meta',TRUE);
	$gridpriority = get_post_meta($post->ID,'_gridpriority',TRUE);

    // instead of writing HTML here, lets do an include
    include(MY_THEME_FOLDER . '/custom/meta.php');

    // create a custom nonce for submit verification later
    echo '<input type="hidden" name="my_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
	echo '<input type="hidden" name="gridpriority_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function my_meta_save($post_id)
{
    // authentication checks

    // make sure data came from our meta box
    if (!wp_verify_nonce($_POST['my_meta_noncename'],__FILE__)) return $post_id;
	if (!wp_verify_nonce($_POST['gridpriority_noncename'],__FILE__)) return $post_id;

    // check user permissions
    if ($_POST['post_type'] == 'page')
    {
        if (!current_user_can('edit_page', $post_id)) return $post_id;
    }
    else
    {
        if (!current_user_can('edit_post', $post_id)) return $post_id;
    }

    // authentication passed, save data

    // var types
    // single: _my_meta[var]
    // array: _my_meta[var][]
    // grouped array: _my_meta[var_group][0][var_1], _my_meta[var_group][0][var_2]

    $current_data = get_post_meta($post_id, '_my_meta', TRUE);
	$current_gridpriority = get_post_meta($post_id, '_gridpriority', TRUE);

    $new_data = $_POST['_my_meta'];
	$new_gridpriority = $_POST['_gridpriority'];

    my_meta_clean($new_data);

    if ($current_gridpriority)
    {
        if (is_null($new_gridpriority)) delete_post_meta($post_id,'_gridpriority');
        else update_post_meta($post_id,'_gridpriority',$new_gridpriority);
    }
    elseif (!is_null($new_gridpriority))
    {
        add_post_meta($post_id,'_gridpriority',$new_gridpriority,TRUE);
    }

    if ($current_data)
    {
        if (is_null($new_data)) delete_post_meta($post_id,'_my_meta');
        else update_post_meta($post_id,'_my_meta',$new_data);
    }
    elseif (!is_null($new_data))
    {
        add_post_meta($post_id,'_my_meta',$new_data,TRUE);
    }

    return $post_id;
}

function my_meta_clean(&$arr)
{
    if (is_array($arr))
    {
        foreach ($arr as $i => $v)
        {
            if (is_array($arr[$i]))
            {
                my_meta_clean($arr[$i]);

                if (!count($arr[$i]))
                {
                    unset($arr[$i]);
                }
            }
            else
            {
                if (trim($arr[$i]) == '')
                {
                    unset($arr[$i]);
                }
            }
        }

        if (!count($arr))
        {
            $arr = NULL;
        }
    }
}
