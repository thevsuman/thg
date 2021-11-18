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
