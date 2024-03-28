document.addEventListener('DOMContentLoaded', function () {
  const selectElement = document.getElementById('category');
  let click = 0;

  console.log(selectElement);

  selectElement.addEventListener('mousedown', function () {
    if (click % 2 === 0) {
      toggleArrowRotation(true);
    } else {
      toggleArrowRotation(false);
    }

    click++;

  });

  selectElement.addEventListener('change', function () {
    toggleArrowRotation(false);

    click++;

  });

  selectElement.addEventListener('blur', function () {
    toggleArrowRotation(false);

    click = 0;
  });

  function toggleArrowRotation(isOpen) {
    const arrowIcon = document.querySelector(
      '.contact__form__fieldset__item__category'
    );
    
    arrowIcon.classList.toggle('rotate-arrow', isOpen);
  }

  var othert = document.getElementById('otherlabelrow');
  othert.style.display = 'none';

  // Add event listener for the 'change' event
  selectElement.addEventListener('change', function () {
    // Function to execute when the select value changes
    var selectedValue = selectElement.value;
    var othertv = document.getElementById('category').value;
    var otherl = document.getElementById('otherlabelrow');
    if (othertv == 6) {
      otherl.style.display = 'block';
    } else {
      otherl.style.display = 'none';
    }
    console.log('Selected value: ' + selectedValue);
    // Add your code to handle the change here
  });

});

jQuery(document).ready(function ($) {

  function generateSessionID() {
    const currentDate = new Date();
    const timePart = currentDate.toISOString().slice(11, 19).replace(/:/g, ''); // Extracts hours, minutes, and seconds
    const datePart = currentDate.toISOString().slice(0, 10).replace(/-/g, ''); // Extracts year, month, and day
    const randomPart = String(Math.floor(Math.random() * 999999)).padStart(
      6,
      '0'
    ); // Generates a random 6-digit number

    const sessionID = timePart + '-' + datePart + '-' + randomPart;
    return sessionID;
  }

  const sessionID = generateSessionID();
  console.log(sessionID);

  let autofillPubsCheck = [];

  $.each(data, function (key, val) {
    console.log(val.Name);
    autofillPubsCheck.push(val.Name);
  });

  const submitButton = $('.contact-form__send-button__inner');

  window.onload = function () {
    document.querySelector('.contact-form__send-button__inner').onclick =
      submitForm;
  };

  function submitForm(event) {
    event.preventDefault();

    //var captchaResponse = grecaptcha.getResponse();
    // if (!captchaResponse) {
    if (1 === 1) {
      var timelabeVal = document.getElementById('timelabe').value;
      var pubcof = document.getElementById(
        'current_most_recent_employer'
      ).value;

      var error = 0;
      var checkval = document.getElementById('category').value;
      if (!checkval) {
        error++;
      }
      var checkval = document.getElementById('enquiry').value;
      if (!checkval) {
        error++;
      }
      var checkval = document.getElementById('first_name').value;
      if (!checkval) {
        error++;
      }
      var checkval = document.getElementById('last_name').value;
      if (!checkval) {
        error++;
      }
      var checkval = document.getElementById('email').value;
      if (!checkval) {
        error++;
      }
      var checkval = document.getElementById('phone').value;
      if (!checkval) {
        error++;
      }
      var checkval = document.getElementById('subject').value;
      if (!checkval) {
        error++;
      }
      var checkval = pubcof;
      if (!checkval) {
        error++;
      }

      if ($.inArray(pubcof, autofillPubsCheck) === -1) {
        ytext =
          'Pub not found. Please select a pub from the options when you start typing.';
        $('.error-message').show().text(ytext);
      } else if (isNaN(timelabeVal) || timelabeVal < 1 || timelabeVal > 99) {
        // If x is Not a Number or less than one or greater than 99
        var ytext = "Please enter the years in trade as a number, e.g '3' ";
        $('.error-message').show().text(ytext);

      } else if (error != 0) {
        var ytext = 'Please complete the required fields';
        $('.error-message').show().text(ytext);

      } else {
        var typevar = document.getElementById('category').value;
        var finaltype = '';
        var pretitle = '';
        if (typevar == '1') {
          var finaltype = '960650001';
        }
        if (typevar == '2') {
          var finaltype = '960650002';
        }
        if (typevar == '3') {
          var finaltype = '960650003';
        }
        if (typevar == '4') {
          var finaltype = '960650000';
        }
        if (typevar == '5') {
          var finaltype = '960650005';
        }
        if (typevar == '7') {
          var finaltype = '960650006';
        }
        if (typevar == '8') {
          var finaltype = '100000000';
        }
        if (typevar == '6') {
          var finaltype = '960650004';
          var pretitle = document.getElementById('otherlabel').value + ': ';
        }

        grecaptcha.execute('6LfxApIpAAAAAFz-qyorl35V_WZ875Z5Kvae0-QC', {
          action: 'contactForm'
        }).then(function (token) {

          const form = jQuery('#contact__form');

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
                $.ajax({
                  url: 'https://prod-26.uksouth.logic.azure.com:443/workflows/14c49af3ac854e70899c833ce191dbf0/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=VOw74d_AG5qFD5sRimpAuTQqxmpokXGKp5zIpcXeoIw',
                  type: 'POST',
                  contentType: 'application/json;charset=UTF-8',
                  data: JSON.stringify({
                    fname: document.getElementById('first_name').value,
                    lname: document.getElementById('last_name').value,
                    type: finaltype,
                    email: document.getElementById('email').value,
                    pnumber: document.getElementById('phone').value,
                    time: timelabeVal,
                    subject:
                      pretitle + document.getElementById('subject').value,
                    question: document.getElementById('enquiry').value,
                    pubcof: pubcof,
                  }),
                  success: function (response) {
                    // Success handling code
                    console.log('Request was successful');
                    console.log('Response:', response);

                    const contactForm = $('.contact__form');

                    crmFormHandleFormSubmission(
                      contactForm,
                      'submit_form',
                      event,
                      true
                    );
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                    // Error handling code
                    console.error('Request failed with status:', jqXHR.status);
                    console.error('Response:', jqXHR.responseText);

                    $('.error-message').text(
                      'Something went wrong. Please try again.'
                    );
                    $('.error-message').show();
                  },
                  complete: function () {},
                });
              }
                  
            }

          })
                
        })

        // alert("Thank you!");
        // $('.submit-button').hide();
      }
    } else {
      // $('.form-warning-message span').text(
      //   'Captcha failed. Please check the "I\'m not a robot" checkbox.'
      // );
    }
  }
});
