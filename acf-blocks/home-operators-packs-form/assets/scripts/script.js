jQuery(document).ready(function ($) {
    const packsForm = $('.packs__form');
    const submitButton = packsForm.find('button[type="submit"]');

    if (packsForm.length) {

      handleFormSubmission(packsForm, 'submit_form_packs');
  
    }  
    
});

function handleFormSubmission(form, action) {
  const loader = form.find('.loader');
  const successMessage = form.find('.success-message');
  const submitButton = form.find('button[type="submit"]');
  const errorMessage = form.find('.error-message');
  const emailInput = form.find('input[name="email"]');

  submitButton.on("click", (e) => {
      e.preventDefault();

      var ytext = 'Please fill up all required fields.';

        // employer
        var pubcof = document.getElementById('pub_name').value;

        var checkval = '';
      var error = 0;
      
      var errText = 'Please complete the required fields.';

        checkval = document.getElementById('first_name').value;
        if (!checkval) {
        error++;
        }
        checkval = document.getElementById('last_name').value;
        if (!checkval) {
        error++;
        }
        checkval = document.getElementById('email').value;
        if (!checkval) {
        error++;
        }

        checkval = document.getElementById('address').value;
        if (!checkval) {
        error++;
        }

        checkval = document.getElementById('town_or_city').value;
        if (!checkval) {
        error++;
        }

        checkval = document.getElementById('county').value;
        if (!checkval) {
        error++;
        }

        checkval = document.getElementById('post_code').value;
        if (!checkval) {
        error++;
        }

        checkval = document.getElementById('number_of_packs').value;
        if (!checkval) {
        error++;
        }

        checkval = pubcof;
        if (!checkval) {
        error++;
      }
      
      if (error > 1) {
        jQuery('.error-message').text(ytext);
        jQuery('.error-message').show();

        return;
      }

    const email = emailInput.val();
    console.log(isValidEmail(email));

    if (!isValidEmail(email)) {
      errorMessage
        .text('Invalid email address. Please enter a valid email.')
        .show();
      return;
    }

    grecaptcha.execute('6LfxApIpAAAAAFz-qyorl35V_WZ875Z5Kvae0-QC', {
      action: 'contactForm'
    }).then(function (token) {

      const loader = form.find('.loader');
          
      const formData = form.serializeArray();
      formData.push({
        name: 'action',
        value: 'relate_form_recaptcha'
      });

      formData.push({
        name: 'token',
        value: token
      });
          
      loader.show();

      jQuery.ajax({
        type: 'POST',
        url: ajax_object.ajax_url,
        data: formData,
        success: function (response) {
          console.log(response);

          if (response !== "Success") {

            $('.error-message').show();

            $('.error-message').text(response);

            loader.hide();

          } else {
            console.log("success");
        

            loader.show();
            submitButton.prop('disabled', true).addClass('disabled');

            const formData = form.serializeArray();
            formData.push({ name: 'action', value: action });

            jQuery.ajax({
              type: 'POST',
              url: ajax_object.ajax_url,
              data: formData,
              success: function (response) {
                console.log('Form submitted successfully');
                console.log(response);

                loader.hide();
                errorMessage.hide();

                form[0].reset();

                successMessage.text('Form submitted successfully!').show();

                setTimeout(function () {
                  successMessage.hide();
                }, 6000);
              },
              error: function (error) {
                console.log('Error submitting form');
                console.log(error.responseText);

                loader.hide();
                errorMessage.text('Error submitting form. Please try again.').show();
              },
              complete: function () {
                submitButton.prop('disabled', false).removeClass('disabled');
              },
            });
          }
        }
      })
    })
  });
}
