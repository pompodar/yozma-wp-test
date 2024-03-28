function crmFormHandleFormSubmission(form, action, event, contactForm = false) {
  event.preventDefault();

  const loader = form.find('.loader');
  const successMessage = form.find('.success-message');
  const submitButton = form.find('button[type="submit"]');
  const errorMessage = form.find('.error-message');
  const emailInput = form.find('input[name="email"]');

    const email = emailInput.val();
    console.log(isValidEmail(email));

    if (!isValidEmail(email)) {
      errorMessage
        .text('Invalid email address. Please enter a valid email.')
        .show();
      return;
    }

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

        successMessage
          .text('Thank you for your message! It has been sent.')
          .show();
        
        if (contactForm) {
      
          window.location.href = '/contact-form-thank-you-page/';

        }

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

function isValidEmail(email) {
  const emailPattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
  return emailPattern.test(email);
}