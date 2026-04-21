  jQuery('document').ready( function(){
    jQuery(".send_contact_mail").on('click', (function (event) {
        var dataReady = true;
        event.preventDefault();

        var $btn = jQuery(this);
        if ($btn.hasClass("loading")) return;
        $btn.addClass("loading");
        
        // Determine which form was submitted
        var $form = jQuery(this).closest('form');
        var formId = $form.attr('id');
        
        // Validate all fields in the current form
        $form.find('.from-control').each(function(){
            if(jQuery(this).val() == ""){
              jQuery(this).next('.invalid-feedback').show();
              $btn.removeClass("loading");
              dataReady = false;
            }else{
                jQuery(this).next('.invalid-feedback').hide();
            }
        })
        
        // Get values based on form type
        var name = $form.find('[name="name"]').val();
        var email = $form.find('[name="email"]').val();
        var phone = $form.find('[name="phone"]').val();
        var service = $form.find('[name="service"]').val();
        var message = $form.find('[name="message"]').val();
        
        // If service field exists (quote form), include it in the message
        if(service){
            message = "Service Requested: " + service + "\n\nProject Details:\n" + message;
        }

        var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!emailRegex.test(email)){
            $form.find('[name="email"]').next('.invalid-feedback').show();
            dataReady = false;
        }

        var phoneRegex = /^\d*$/;
        if(!phoneRegex.test(phone) || phone.length < 10){
            $form.find('[name="phone"]').next('.invalid-feedback').show();
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
                var responce = return_data.trim();
                if(responce == 'true'){
                    // Show success message
                    if(formId == 'contact-form'){
                        jQuery(".contact-widget").hide();
                        jQuery(".email-sent-message").show();
                    } else if(formId == 'user-contact-form'){
                        jQuery("#user-contact-form").hide();
                        jQuery(".quote-sent-message").show();
                    }
                }else{
                    // Show error message using a better UI element
                    var errorMessage = jQuery('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry, something went wrong. Please try again later.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    if(formId == 'contact-form'){
                        jQuery("#form-messages").html(errorMessage);
                    } else if(formId == 'user-contact-form'){
                        jQuery("#user-contact-form").prepend(errorMessage);
                    }
                }
            },
            error: function () {
                console.log("Something went wrong");
                var errorMessage = jQuery('<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry, there was an error submitting the form. Please try again.<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                if(formId == 'contact-form'){
                    jQuery("#form-messages").html(errorMessage);
                } else if(formId == 'user-contact-form'){
                    jQuery("#user-contact-form").prepend(errorMessage);
                }
            },
            complete: function () {
                $btn.removeClass("loading");
            }
        });
    })
    )
    
    // Reset quote form when modal is closed
    jQuery('#quoteModal').on('hidden.bs.modal', function() {
        jQuery("#user-contact-form").show();
        jQuery(".quote-sent-message").hide();
        jQuery("#user-contact-form")[0].reset();
        jQuery("#user-contact-form .alert").remove();
    });
})