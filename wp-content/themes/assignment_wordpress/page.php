<?php get_header(); ?>
<main id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
</header>
<div class="entry-content" itemprop="mainContentOfPage">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
<?php echo do_shortcode( '[contact-form-7 id="6" title="Client form"]' ); ?>

<?php
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

?>

</article>
<?php if ( comments_open() && !post_password_required() ) { comments_template( '', true ); } ?>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>