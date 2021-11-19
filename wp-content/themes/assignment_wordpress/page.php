<?php get_header(); ?>

<body <?php body_class();?>>

<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>

<?php echo do_shortcode( '[contact-form-7 id="6" title="Client form"]' ); ?>




<?php
// Get the 'Profiles' post type
$args = array(
    'post_type' => 'client',
);
$loop = new WP_Query($args);
echo '<table>';
echo '<tr>';
while($loop->have_posts()): $loop->the_post();

echo '<td>';
the_title();
echo '</td>';

echo '<td>';
$value = get_post_meta($post->ID,'first_name',true);
echo $value;
echo '</td>';

echo '<td>';
$value = get_post_meta($post->ID,'last_name',true);
echo $value;
echo '</td>';

echo '<td>';
$value = get_post_meta($post->ID,'email',true);
echo $value;
echo '</td>';

echo '<td>';
$value = get_post_meta($post->ID,'phone',true);
echo $value;
echo '</td>';

echo '<td>';
$value = get_post_meta($post->ID,'address',true);
echo $value;
echo '</td>';

echo '</tr>';
endwhile;
echo '</table>';
wp_reset_query();
?>

<body>

<?php get_footer(); ?>