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

  const selectElements = document.querySelectorAll('select');

  selectElements.forEach(function (selectElement) {
    selectElement.setAttribute('data-click', '0');

    selectElement.addEventListener('mousedown', function () {
      const click = parseInt(selectElement.getAttribute('data-click'));

      if (click % 2 === 0) {
        toggleArrowRotation(true, selectElement);
      } else {
        toggleArrowRotation(false, selectElement);
      }

      selectElement.setAttribute('data-click', (click + 1).toString());
    });

    selectElement.addEventListener('change', function () {
      toggleArrowRotation(false, selectElement);
      selectElement.setAttribute('data-click', '0');
    });

    selectElement.addEventListener('blur', function () {
      toggleArrowRotation(false, selectElement);
      selectElement.setAttribute('data-click', '0');
    });
  });

  function toggleArrowRotation(isOpen, selectElement) {
    const arrowIcon = selectElement.closest(
      '.referral__form__fieldset__item__select'
    );

    arrowIcon.classList.toggle('rotate-arrow', isOpen);
  }

  const autofillPubsCheck = [];

  $.each(data, function (key, val) {
    console.log(val.Name);
    autofillPubsCheck.push(val.Name);
  });

  const submitButton = $('.referral-form__send-button__inner');

  var eligibleWarning = $('.noyeartrade-ineligible');
  var greenKing = $('#yearsingreenking');
  var greenKingSavings = $('#greenkingsavings');
  var greenKingIncome = $('#greenkingincome');
  var noyeartrade = $('#number_of_years_in_trade');

  $('#current_most_recent_employer').focusout(function () {
    var years = noyeartrade.val();
    setTimeout(function () {
      yearsInGreenKingCheck(years);
    }, 500);
  });

  noyeartrade.change(function () {
    var years = $(this).val();
    yearsInGreenKingCheck(years);
  });

  greenKing.change(function () {
    savingsGreenKingCheck();
  });

  greenKingSavings.change(function () {
    incomeGreenKingCheck();
  });

  function yearsInGreenKingCheck(years) {
    var employer = $('#current_most_recent_employer').val();
    var val = greenKing.val();
    console.log(years, employer);

    if (years < 5 && employer !== 'Greene King - Managed' && employer) {
      console.log('op1');
      console.log(greenKing);
      greenKing.parent().hide();
      greenKing.prop('required', false);

      greenKingSavings.parent().hide();
      greenKingSavings.prop('required', false);

      greenKingIncome.parent().hide();
      greenKingIncome.prop('required', false);

      $('#greenkingemployerWarning').show();

      submitButton.prop('disabled', true).addClass('disabled');

    } else if (years < 5 && employer === 'Greene King - Managed') {
      console.log('op2');
      eligibleWarning.hide();
      submitButton.prop('disabled', false).removeClass('disabled');

      greenKing.parent().show();
      greenKing.prop('required', true);

      console.log(greenKing.parent());
      savingsGreenKingCheck();
    } else {
      console.log('op3');
      greenKing.parent().hide();
      greenKingSavings.parent().hide();
      greenKingSavings.prop('required', false);

      greenKingIncome.parent().hide();
      greenKingIncome.prop('required', false);

      eligibleWarning.hide();
      submitButton.prop('disabled', false).removeClass('disabled');

    }
  }

  function savingsGreenKingCheck(years) {
    var val = greenKing.val();
    if (val === 'yes') {
      eligibleWarning.hide();
      submitButton.prop('disabled', false).removeClass('disabled');

      greenKingSavings.parent().show();
      greenKingSavings.prop('required', true);

      incomeGreenKingCheck();
      doIncomeResult();
    } else {
      greenKingSavings.parent().hide();
      greenKingSavings.prop('required', false);

      greenKingIncome.parent().hide();
      greenKingIncome.prop('required', false);
      
      submitButton.prop('disabled', false).removeClass('disabled');

      if (val === 'no') {
        eligibleWarning.hide();
        $('#yearsingreenkingWarning').show(); // else show warning for years in greenking
        submitButton.prop('disabled', true).addClass('disabled');

      }
    }
  }

  function incomeGreenKingCheck() {
    var val = greenKingSavings.val();
    if (val === 'no') {
      eligibleWarning.hide();
      submitButton.prop('disabled', false).removeClass('disabled');

    } else {
      if (val === 'yes') {
        eligibleWarning.hide();
        $('#greenkingsavingsWarning').show(); // else show warning for savings in greenking
        submitButton.prop('disabled', true).addClass('disabled');

      }
    }
  }

  function doIncomeResult() {
    var val = greenKingIncome.val();
    if (val === 'yes') {
      eligibleWarning.hide();
      submitButton.prop('disabled', false).removeClass('disabled');

    } else {
      eligibleWarning.hide();
      submitButton.prop('disabled', false).removeClass('disabled');

      if (val === 'no') {
        $('#greenkingincomeWarning').show(); // else show warning for income in greenking
        submitButton.prop('disabled', true).addClass('disabled');

      }
    }
  }

  window.onload = function () {
    document.querySelector('.referral-form__send-button__inner').onclick =
      submitForm;
  };

  function submitForm(event) {
    event.preventDefault();

    //var captchaResponse = grecaptcha.getResponse();
    // if (!captchaResponse) {
    if (1 === 1) {
      // Get the value of years in trade
      var timelabeVal = document.getElementById(
        'number_of_years_in_trade'
      ).value;

      // employer
      var pubcof = document.getElementById(
        'current_most_recent_employer'
      ).value;

      var checkval = '';
      var error = 0;
      var errText = 'Please complete the required fields.';

      checkval = document.getElementById('yearsingreenking').value;

      if (!checkval && document.getElementById('yearsingreenking').style.Display == "block") {
        error++;
      }

      checkval = document.getElementById('yearsingreenking');
      if (!checkval.value && checkval.hasAttribute('required')) {
        error++;
      }

      checkval = document.getElementById('yearsingreenkingWarning');
      if (!checkval.value && checkval.hasAttribute('required')) {
        error++;
      }

      checkval = document.getElementById('greenkingsavings');
      if (!checkval.value && checkval.hasAttribute('required')) {
        error++;
      }

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
      checkval = document.getElementById('phone').value;
      if (!checkval) {
        error++;
      }
      checkval = document.getElementById('tic_tc_name').value;
      if (!checkval) {
        error++;
      }

      if ($('#category').val() == null) {
        error++;
      }
      if ($('#housing_status').val() == null) {
        error++;
      }
      if ($('#family_status').val() == null) {
        error++;
      }
      if ($('#employment_status').val() == null) {
        error++;
      }

      checkval = jQuery('#gender').val();
      if (!checkval) {
        error++;
      }
      checkval = pubcof;
      if (!checkval) {
        error++;
      }

      //dob

      dobDay = document.getElementById('day').value;
      if (!dobDay) {
        error++;
      }
      dobMonth = document.getElementById('month').value;
      if (!dobMonth) {
        error++;
      }
      dobYear = document.getElementById('year').value;
      if (!dobYear) {
        error++;
      }

      console.log(error);

      if ($.inArray(pubcof, autofillPubsCheck) === -1) {
        ytext =
          'Pub not found. Please select a pub from the options when you start typing.';
        $('.error-message').text(ytext);
        $('.error-message').show();
      } else if (isNaN(timelabeVal) || timelabeVal < 1 || timelabeVal > 99) {
        // If x is Not a Number or less than one or greater than 99
        var ytext = "Please enter the number of people as a number, e.g '3' ";
        $('.error-message').text(ytext);
        $('.error-message').show();
      } else if (error != 0) {
        var ytext = errText;
        $('.error-message').text(ytext);
        $('.error-message').show();
      } else {
        $('.error-message').hide();

        var typevar = document.getElementById('category').value;
        var finaltype = '';
        if (typevar == 'Mental Health') {
          finaltype = '960650001';
        }
        if (typevar == 'Housing') {
          finaltype = '960650002';
        }
        if (typevar == 'Health') {
          finaltype = '960650003';
        }
        if (typevar == 'Money') {
          finaltype = '960650000';
        }
        if (typevar == 'Education and Training') {
          finaltype = '960650005';
        }

        var gendervar = document.getElementById('gender').value;
        var gendertype = '';
        if (gendervar == 'Female') {
          gendertype = '2';
        }
        if (gendervar == 'Male') {
          gendertype = '1';
        }
        if (gendervar == 'Other') {
          gendertype = '960650020';
        }
        if (gendervar == 'Trans') {
          gendertype = '960650010';
        }

        var housevar = document.getElementById('housing_status').value;
        var housetype = '';
        if (housevar == 'Houseless') {
          housetype = '960650000';
        }
        if (housevar == 'Hostel') {
          housetype = '960650001';
        }
        if (housevar == 'Housing Association') {
          housetype = '960650002';
        }
        if (housevar == 'Living with Relatives') {
          housetype = '960650003';
        }
        if (housevar == 'Local Auth. Perm.') {
          housetype = '960650004';
        }
        if (housevar == 'Local Auth. Temp.') {
          housetype = '960650005';
        }
        if (housevar == 'Owner Occupier') {
          housetype = '960650006';
        }
        if (housevar == 'Private Rented') {
          housetype = '960650007';
        }
        if (housevar == 'Residential Care') {
          housetype = '960650008';
        }
        if (housevar == 'Residential Park Home') {
          housetype = '960650009';
        }
        if (housevar == 'Shared Ownership') {
          housetype = '960650010';
        }
        if (housevar == 'Shared Ownership Adapted') {
          housetype = '960650011';
        }
        if (housevar == 'Sheltered Accommodation') {
          housetype = '960650012';
        }
        if (housevar == 'Tied Accommodation') {
          housetype = '960650013';
        }

        var empvar = document.getElementById('employment_status').value;
        var emptype = '';
        if (empvar == 'Not Working') {
          emptype = '960650000';
        }
        if (empvar == 'Not Working Carer') {
          emptype = '960650001';
        }
        if (empvar == 'Not Working Long Term') {
          emptype = '960650002';
        }
        if (empvar == 'Not Working Short Term') {
          emptype = '960650003';
        }
        if (empvar == 'Retired') {
          emptype = '960650004';
        }
        if (empvar == 'Self Employed') {
          emptype = '960650005';
        }
        if (empvar == 'Student') {
          emptype = '960650006';
        }
        if (empvar == 'Unemployed Seeking') {
          emptype = '960650007';
        }
        if (empvar == 'Working') {
          emptype = '960650008';
        }

        var familystatusvar = document.getElementById('family_status').value;
        var familystatustype = '';
        if (familystatusvar == 'Couple') {
          familystatustype = '960650000';
        }
        if (familystatusvar == 'Divorced') {
          familystatustype = '960650004';
        }
        if (familystatusvar == 'Family') {
          familystatustype = '960650008';
        }
        if (familystatusvar == 'Separated') {
          familystatustype = '960650012';
        }
        if (familystatusvar == 'Single') {
          familystatustype = '960650016';
        }
        if (familystatusvar == 'Widowed') {
          familystatustype = '960650020';
        }

        var dobVal = dobYear + '-' + dobMonth + '-' + dobDay;

        var SavingsInGreenKing =
          document.getElementById('greenkingsavings').value;
        var YearsInGreenKingVal = '';
        var grantRefNumber = '';
        // if employed in Green King Managed and they have no savings, grant ref number changes
        if (pubcof === 'Greene King - Managed' && SavingsInGreenKing == 'no') {
          YearsInGreenKingVal = '2EAB8ECA-11AA-E911-A8AF-002248005489';
          grantRefNumber = '100000000';
        }

        /**/
        var submitData = {
          fname: document.getElementById('first_name').value,
          lname: document.getElementById('last_name').value,
          type: finaltype,
          email: document.getElementById('email').value,
          pnumber: document.getElementById('phone').value,
          householdno: document.getElementById('number_of_years_in_trade')
            .value,
          subject: document.getElementById('tic_tc_name').value,
          callnotes: document.getElementById('reason_for_referral').value,
          street1: document.getElementById('address_first_line').value,
          street2: document.getElementById('address_second_line').value,
          city: document.getElementById('city').value,
          county: document.getElementById('county').value,
          postcode: document.getElementById('post_code').value,
          gender: gendertype,
          housestatus: housetype,
          empstatus: emptype,
          familystatus: familystatustype,
          dob: dobVal,
          notradeyears: document.getElementById('number_of_years_in_trade')
            .value,
          mobile: document.getElementById('phone').value,
          yearsingreenking: YearsInGreenKingVal,
          grantrefno: grantRefNumber,
          carefirstrefno: document.getElementById('care_first_reference_number')
            .value,
          sessionid: sessionID,
          pubcof: pubcof,
        };

        grecaptcha.execute('6LfxApIpAAAAAFz-qyorl35V_WZ875Z5Kvae0-QC', {
          action: 'contactForm'
        }).then(function (token) {

          const form = jQuery('#referral__form');

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
                  url: 'https://prod-29.uksouth.logic.azure.com:443/workflows/ba84262c016f41cd9559ff94e349fff2/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=Iyu9FNjOOUjhwWrt2JjVS4Z-8tX-SmbvTfkOMAqVgf4',
                  type: 'POST',
                  contentType: 'application/json;charset=UTF-8',
                  data: JSON.stringify(submitData),
                  success: function (response) {
                    // Success handling code
                    console.log('Request was successful');
                    console.log('Response:', response);

                    const referralForm = $('.referral__form');
            
                    referralFormHandleFormSubmission(
                      referralForm,
                      'submit_form_referral', event
                    );
                  },
                  error: function (jqXHR, textStatus, errorThrown) {
                    // Error handling code
                    console.error('Request failed with status:', jqXHR.status);
                    console.error('Response:', jqXHR.responseText);

                    $('.error-message').text('Something went wrong. Please try again.');
                    $('.error-message').show();
                  },
                  complete: function () {
            
                  },
                });

                console.log(submitData);
                
              }
            }
          })
        })
      }
    } else {
      // $('.form-warning-message span').text(
      //   'Captcha failed. Please check the "I\'m not a robot" checkbox.'
      // );
    }
  }
});