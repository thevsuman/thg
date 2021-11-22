<?php

function load_stylesheets()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, all);
    wp_enqueue_style('bootstrap');
	wp_register_style('style-css', get_template_directory_uri() . '/css/custom-style.css', array(), false, all);
    wp_enqueue_style('style-css');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');


function collectiveray_theme_scripts_function()
{
	wp_enqueue_script('jquery-js','https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, false );		
	wp_enqueue_script('js-file', get_template_directory_uri() . '/js/scripts.js');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
}
  add_action('wp_enqueue_scripts', 'collectiveray_theme_scripts_function');
  
 

function save_posted_data($posted_data)
{
    $args = array(
      'post_type' => 'client',
      'post_status'=>'publish',
      'post_title'=>$posted_data['email'],
       'post_content'=>$posted_data['first_name'],
    );
    $post_id = wp_insert_post($args);

    if (!is_wp_error($post_id)) {
        if (isset($posted_data['first_name'])) {
            update_post_meta($post_id, 'first_name', $posted_data['first_name']);
        }
        if (isset($posted_data['last_name'])) {
            update_post_meta($post_id, 'last_name', $posted_data['last_name']);
        }
        if (isset($posted_data['email'])) {
            update_post_meta($post_id, 'email', $posted_data['email']);
        }
        if (isset($posted_data['phone'])) {
            update_post_meta($post_id, 'phone', $posted_data['phone']);
        }
        if (isset($posted_data['address'])) {
            update_post_meta($post_id, 'address', $posted_data['address']);
        }
        if (isset($posted_data['city'])) {
            update_post_meta($post_id, 'city', $posted_data['city']);
        }
        //and so on ...
        return $posted_data;
    }
}

add_filter('wpcf7_posted_data', 'save_posted_data');

/*Ajax Call
*/
function add_ajax_scripts() {
    wp_enqueue_script( 'ajaxcalls', get_template_directory_uri() . '/js/ajax-calls.js', array(), '1.0.0', true );

    wp_localize_script( 'ajaxcalls', 'ajax_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'ajaxnonce' => wp_create_nonce( 'ajax_post_validation' )
    ) );
}

add_action( 'wp_enqueue_scripts', 'add_ajax_scripts' );


function custom_update_post() {
    $post_id = $_POST['post_id'];
	
    update_post_meta( $post_id, 'first_name', $_POST['first_name']);
	update_post_meta( $post_id, 'last_name', $_POST['last_name'] );
    update_post_meta( $post_id, 'email', $_POST['email'] );
    update_post_meta( $post_id, 'phone', $_POST['phone'] );
    update_post_meta( $post_id, 'address', $_POST['address'] );
    update_post_meta( $post_id, 'city', $_POST['city'] );
    
    wp_die();
}

add_action( 'wp_ajax_custom_update_post', 'custom_update_post' );

//Email Validation already exits or not
add_filter( 'wpcf7_validate_email*', 'custom_email_validation_filter', 50, 2 );

function custom_email_validation_filter( $result, $tag ) {
if ( 'your-email' == $tag->name ) {
$your_email = isset( $_POST['your-email'] ) ? trim( $_POST['your-email'] ) : '';

global $wpdb; 

$cf7table = $wpdb->prefix.'db7_forms';

$db = $wpdb->get_results ( "SELECT * FROM $cf7table WHERE `form_value` LIKE '%".$your_email."%' "); 
//echo $wpdb->num_rows;
print_r($db);
if ( $wpdb->num_rows > 0) {
$result->invalidate( $tag, "The email is already exist." );
}
}

return $result;
}