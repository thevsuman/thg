<div class="hcf_box">
    <style scoped>
        .hcf_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .hcf_field{
            display: contents;
        }
    </style>
    <p class="meta-options tgh_field">
        <label for="first_name">First Name</label>
<input id="f_name" type="text" name="first_name" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'first_name', true ) ); ?>"/>
    </p>
    <p class="meta-options tgh_field">
        <label for="last_name">Last Name</label>
        <input id="l_name" type="text" name="last_name" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'last_name', true ) ); ?>"/>
    </p>
    <p class="meta-options tgh_field">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'email', true ) ); ?>">
    </p>
    <p class="meta-options tgh_field">
        <label for="phone">Phone</label>
        <input id="phone" type="tel" name="phone" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'phone', true ) ); ?>">
    </p>
    <p class="meta-options tgh_field">
        <label for="address">Address</label>
        <input id="tel" type="text" name="address" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'address', true ) ); ?>">
    </p>
  
    <p class="meta-options tgh_field">
        <label for="city">City</label>
        <input id="city" type="text" name="city" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'city', true ) ); ?>">
    </p>
</div>