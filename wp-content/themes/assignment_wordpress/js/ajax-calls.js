jQuery(document).ready( function($) {
    $('.your_class_to_update').on('click', function() {
        var post_id = $(this).attr( 'id' );
        var first_name= $('.'+post_id+'first_name').val();
        var last_name= $('.'+post_id+'last_name').val();
        var email= $('.'+post_id+'email').val();
        var phone= $('.'+post_id+'phone').val();
        var address= $('.'+post_id+'address').val();
        var city= $('.'+post_id+'city').val();
      
        // alert(first_name);
        $.ajax({
            type: 'POST',
            url: ajax_object.ajaxurl,
            data: {
                action: 'custom_update_post',
                post_id: post_id,
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone: phone,
                address: address,
                city: city
            }
        });
    });
});