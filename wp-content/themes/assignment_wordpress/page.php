<?php get_header(); ?>

<body <?php body_class();?>>

   <!-- <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
-->
    <?php echo do_shortcode( '[contact-form-7 id="6" title="Client form"]' ); ?>




    <?php
// Get the 'Profiles' post type
$args = array(
    'post_type' => 'client',
);
$loop = new WP_Query($args);
echo '<div class="container row-data">';
while($loop->have_posts()): $loop->the_post();

echo '<div class="row">';

/*
echo '<div class="col-md col-sm">';
the_title();
echo '</div>';
*/
echo '<div class="col-md col-sm cel">';
$first_name = get_post_meta($post->ID,'first_name',true);
//echo $value;
?> <input type='text' class='<?php echo $post->ID; ?>first_name' value=<?php echo $first_name; ?> name='first_name' /> <?php
echo '</div>';

echo '<div class="col-md col-sm cel">';
$last_name = get_post_meta($post->ID,'last_name',true);
//echo $value;
?> <input type='text' class='<?php echo $post->ID; ?>last_name' value=<?php echo $last_name; ?> name='last_name' /> <?php

echo '</div>';

echo '<div class="col-md col-sm cel">';
$email = get_post_meta($post->ID,'email',true);
//echo $value;
?> <input type='text' class='<?php echo $post->ID; ?>email' value=<?php echo $email; ?> name='email' /> <?php

echo '</div>';

echo '<div class="col-md col-sm cel">';
$phone = get_post_meta($post->ID,'phone',true);
//echo $value;
?> <input type='text' class='<?php echo $post->ID; ?>phone' value=<?php echo $phone; ?> name='phone' /> <?php

echo '</div>';

echo '<div class="col-md col-sm cel">';
$address = get_post_meta($post->ID,'address',true);
?> <input type='text' class='<?php echo $post->ID; ?>address' value=<?php echo $address; ?> name='address' /> <?php

//echo $value;
echo '</div>';

echo '<div class="col-md col-sm cel">';
$city = get_post_meta($post->ID,'city',true);
?> <input type='text' class='<?php echo $post->ID; ?>city' value=<?php echo $city[0]; ?> name='city' /> <?php

echo '</div>';


echo '<div class="col-md col-sm cel">';
?>
<a onclick="return confirm('Are you SURE you want to delete this post?')" href="<?php echo get_delete_post_link( $post->ID ) ?>">Delete</a>
<a id="<?php echo get_the_ID(); ?>" class="your_class_to_update"> Update</a>
<?php
echo '</div>';
echo '</div>';
endwhile;

wp_reset_query();
?>

    <body>

        <?php get_footer(); ?>