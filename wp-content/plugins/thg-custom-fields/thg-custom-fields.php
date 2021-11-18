<?php
/**
 * Plugin Name: The Hour Glass Custom Fields 
 * Description: Client custom fields.
 * Version: 1.0
 * Author: Thevsuman
 */
/**
 * Register meta boxes.
 */
function thg_register_meta_boxes() {
    add_meta_box( 'thg-1', __( 'Client Fields', 'hcf' ), 'thg_display_callback', 'client' );
}
add_action( 'add_meta_boxes', 'thg_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function thg_display_callback( $post ) {

   // echo "test";
    include plugin_dir_path( __FILE__ ) . './client_form.php';
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function tgh_save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $fields = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
    ];
    foreach ( $fields as $field ) {
        if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
        }
     }
}
add_action( 'save_post', 'tgh_save_meta_box' );



add_filter( 'wpcf7_validate', 'email_already_in_db', 10, 2 );

function email_already_in_db ( $result, $tags ) {
    // Retrieve the posted form
    $form  = WPCF7_Submission::get_instance();
    $form_posted_data = $form->get_posted_data();

    // Get the field name that we want to check for duplicates.
    // I added 'unique' to the beginning of the field name in CF7
    // Checking for that with preg_grep
    $unique_field_name = preg_grep("/unique(\w+)/", array_keys($form_posted_data));

    // $unique_field_name comes back as array so the next three lines give us the key as a string
    reset($unique_field_name);
    $first_key = key($unique_field_name);
    $unique_field_name = $unique_field_name[$first_key];

    // Check the form submission unique field vs what is already in the database
    $email = $form->get_posted_data($unique_field_name);
    global $wpdb;
    $entry = $wpdb->get_results( "SELECT * FROM wp_cf7_vdata_entry WHERE name LIKE '$unique_field_name' AND value='$email'" );

    // If already in database, invalidate
    if (!empty($entry)) {
      $result->invalidate($field_name, 'Your email: '.$email.' already exists in our database.');
      }
    // return the filtered value
  return $result;
}


/*add_filter("wpcf7_ajax_json_echo", function ($response, $result) {


    $response["message"] = "a custom message";


    return $response;

});
/*
add_action( 'wpcf7_before_send_mail', 'CF7_pre_send' );
 
function CF7_pre_send($cf7) {
  
   $output .= "Email: " . $_POST['email'];
   $result->invalidate('email', 'Your email exists in our database');
 file_put_contents("cf7outputtest.txt", $output);
}

/*
add_filter( 'wpcf7_validate', 'email_already_in_db', 10, 2 );

function email_already_in_db ( $result, $tags ) {
    // retrieve the posted email
    $form  = WPCF7_Submission::get_instance();
    $email = $form->get_posted_data('email');
    echo $email;
    // if already in database, invalidate
    if( email_exists( $email ) ) // email_exists is a WP function
        $result->invalidate('your-email', 'Your email exists in our database');
        file_put_contents("cf7outputtest.txt", $output);
    // return the filtered value
    return $result;
}

*/