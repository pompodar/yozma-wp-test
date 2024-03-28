/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ (function(module) {

"use strict";
module.exports = jQuery;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
!function() {
/*!************************************************************************!*\
  !*** ../acf-blocks/home-operators-packs-form/assets/scripts/script.js ***!
  \************************************************************************/
/* provided dependency */ var jQuery = __webpack_require__(/*! jquery */ "jquery");
/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "jquery");
jQuery(document).ready(function ($) {
    var packsForm = $('.packs__form');
    var submitButton = packsForm.find('button[type="submit"]');

    if (packsForm.length) {

      handleFormSubmission(packsForm, 'submit_form_packs');
  
    }  
    
});

function handleFormSubmission(form, action) {
  var loader = form.find('.loader');
  var successMessage = form.find('.success-message');
  var submitButton = form.find('button[type="submit"]');
  var errorMessage = form.find('.error-message');
  var emailInput = form.find('input[name="email"]');

  submitButton.on("click", function (e) {
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

    var email = emailInput.val();
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

      var loader = form.find('.loader');
          
      var formData = form.serializeArray();
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

            var formData = form.serializeArray();
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

}();
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!*************************************************************************!*\
  !*** ../acf-blocks/home-operators-packs-form/assets/styles/styles.scss ***!
  \*************************************************************************/
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

}();
/******/ })()
;
//# sourceMappingURL=home-operators-packs-form.js.map