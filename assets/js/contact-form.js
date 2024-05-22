  jQuery('document').ready( function(){
    jQuery(".send_contact_mail").on('click', (function (event) {
        var dataReady = true;
        console.log('yes working');
        event.preventDefault();
        jQuery('form#contact-form .from-control').each(function(){
            console.log(jQuery(this).attr('name'));
            if(jQuery(this).val() == ""){
              jQuery(this).next().show();
              dataReady = false;
            }else{
                jQuery(this).next().hide();
            }
        })
        var name = jQuery("#name").val();
        var email = jQuery("#email").val();
        var phone = jQuery("#phone").val();
        var message = jQuery("#message").val();

        var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!emailRegex.test(email)){
            jQuery("#email").next().show();
            dataReady = false;
        }

        var phoneRegex = /^\d*$/;
        if(!phoneRegex.test(phone) || phone.length < 10){
            jQuery("#phone").next().show();
            dataReady = false;
        }

        if(!dataReady){
            return false;
        }

        var details = {
            name: name,
            email: email,
            phone: phone,
            message: message,
        };

        jQuery.ajax({
            url: "send-email.php",
            type: "POST",
            data: details,
            success: function (return_data) {
                jQuery(".send-mail-responce").val(return_data);
                var responce = return_data;
                if(responce == 'true'){
                    jQuery(".contact-widget").hide();
                    jQuery(".email-sent-message").show();
                }else{
                    jQuery('.emil-sent-failed-message').show();
                }
            },
            error: function () {
                // jQuery('.loading-area').hide();
                console.log("Something went wrong");
            },
        });
    })
    )

})