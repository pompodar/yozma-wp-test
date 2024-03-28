/******/ (function() { // webpackBootstrap
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
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
/*!************************************************************!*\
  !*** ../acf-blocks/donate-donors/assets/scripts/script.js ***!
  \************************************************************/
document.addEventListener('DOMContentLoaded', function () {

  if (!document.querySelector('#view_all')) { return; }
  var button = document.querySelector('#view_all');
  var container = document.querySelector('.donors__row-bottom');

  button.addEventListener('click', function () {
    var height = window.innerWidth > 768 ? '123rem' : '260rem';
    var padding = window.innerWidth > 768 ? '12rem 2rem' : '6rem 0';


    var isOpened =
      container.style.maxHeight !== height &&
      container.style.maxHeight !== '';

    container.style.maxHeight = isOpened
      ? height
      : 'none';
    
      container.style.padding = isOpened ? '0' : padding;


  });
});
}();
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!*************************************************************!*\
  !*** ../acf-blocks/donate-donors/assets/styles/styles.scss ***!
  \*************************************************************/
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

}();
/******/ })()
;
//# sourceMappingURL=donate-donors.js.map