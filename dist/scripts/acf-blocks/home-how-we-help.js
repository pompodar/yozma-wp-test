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
/*!***************************************************************!*\
  !*** ../acf-blocks/home-how-we-help/assets/scripts/script.js ***!
  \***************************************************************/
/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "jquery");
$(document).ready(function () {
  $('.how__row-bottom__card__text').each(function () {
    var $textElement = $(this);
    var $siblingBackground = $textElement.prev();

    // Get the height of the text element
    var blockHeight = $textElement.height() / 150;

    var difference = blockHeight - 1;

    // Adjust difference to be within a specific range
    difference = difference < 0 ? difference + 0.2 : difference - 0.;

    console.log(difference);

    // Set the clip-path based on the height
    var clipPath = "polygon(0px " + (46 - difference * 46) + "%, 100% " + (49 - difference * 49) + "%, 100% 100%, 0px 100%)";

    // Use jQuery to set the clipPath property
    $siblingBackground.css('clip-path', clipPath);
  });
});

}();
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!****************************************************************!*\
  !*** ../acf-blocks/home-how-we-help/assets/styles/styles.scss ***!
  \****************************************************************/
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

}();
/******/ })()
;
//# sourceMappingURL=home-how-we-help.js.map