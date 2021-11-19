<?php

/**
 * Register meta boxes.
 */
/*function thg_register_meta_boxes() {
    add_meta_box( '', __( 'Hello Custom Field', 'hcf' ), 'thg_display_callback', 'post' );
}
add_action( 'add_meta_boxes', 'thg_register_meta_boxes' );

*/

function load_stylesheets()
{
    wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',array(), false,all );
    wp_enqueue_style( 'bootstrap');
}
add_action( 'wp_enqueue_scripts', 'load_stylesheets');


function loadjs(){
    wp_register_script('customjs', get_template_directory_uri() .'/js/scripts.js', '', 1, true );
    wp_enqueue_script('wp_enqueue_scripts','loadjs');
}
add_action('wp_enqueue_scripts','loadjs');

function cptui_register_my_cpts() {

	/**
	 * Post Type: clients.
	 */

	$labels = [
		"name" => __( "clients", "custom-post-type-ui" ),
		"singular_name" => __( "client", "custom-post-type-ui" ),
		"menu_name" => __( "client", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "clients", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "client", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "client", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_cpts_client() {

	/**
	 * Post Type: clients.
	 */

	$labels = [
		"name" => __( "clients", "custom-post-type-ui" ),
		"singular_name" => __( "client", "custom-post-type-ui" ),
		"menu_name" => __( "client", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "clients", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "client", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "client", $args );
}

add_action( 'init', 'cptui_register_my_cpts_client' );


function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Clients.
	 */

	$labels = [
		"name" => __( "Clients", "custom-post-type-ui" ),
		"singular_name" => __( "Client", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Clients", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'client', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "client",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "client", [ "wpcf7_contact_form", "client" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

function cptui_register_my_taxes_client() {

	/**
	 * Taxonomy: Clients.
	 */

	$labels = [
		"name" => __( "Clients", "custom-post-type-ui" ),
		"singular_name" => __( "Client", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => __( "Clients", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'client', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "client",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "client", [ "wpcf7_contact_form", "client" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_client' );


function save_posted_data( $posted_data ) {


	$args = array(
	  'post_type' => 'client',
	  'post_status'=>'publish',
	  'post_title'=>$posted_data['email'],
	   'post_content'=>$posted_data['first_name'],
	);
	$post_id = wp_insert_post($args);

	if(!is_wp_error($post_id)){
	  if( isset($posted_data['first_name']) ){
		update_post_meta($post_id, 'first_name', $posted_data['first_name']);
	  }
	  if( isset($posted_data['last_name']) ){
	    update_post_meta($post_id, 'last_name', $posted_data['last_name']);
	  }
	  if( isset($posted_data['email']) ){
	    update_post_meta($post_id, 'email', $posted_data['email']);
	  }
	  if( isset($posted_data['phone']) ){
		update_post_meta($post_id, 'phone', $posted_data['phone']);
	  }
	  if( isset($posted_data['address']) ){
		update_post_meta($post_id, 'address', $posted_data['address']);
	  }
	  if( isset($posted_data['city']) ){
		update_post_meta($post_id, 'city', $posted_data['city']);
	  }
   //and so on ...
   return $posted_data;
  }
}

add_filter( 'wpcf7_posted_data', 'save_posted_data' );



