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
/*!*****************************************************************!*\
  !*** ../acf-blocks/donate-fundraising/assets/scripts/script.js ***!
  \*****************************************************************/
document.addEventListener('DOMContentLoaded', function () {
  var fundraisingItems = document.querySelectorAll(
    '.fundraising .list__item'
  );

  fundraisingItems.forEach(function (item, index) {
    var title = item.querySelector('.list__item__heading');
    var plusButton = item.querySelector('.list__item__plus');

    title.addEventListener('click', function () {
      toggleFundraisingParagraph(index);
    });

    plusButton.addEventListener('click', function () {
      toggleFundraisingParagraph(index);
    });
  });

  function toggleFundraisingParagraph(index) {
    var fundraisingParagraphs = document.querySelectorAll(
      '.fundraising .list__item__paragraph'
    );
    var fundraisingPluses = document.querySelectorAll(
      '.fundraising .list__item__plus'
    );

    var currentFundraisingParagraph = fundraisingParagraphs[index];
    var isOpened =
      currentFundraisingParagraph.style.backgroundSize === 'cover';

    var windowWidth = window.innerWidth;

    currentFundraisingParagraph.style.backgroundSize = isOpened
      ? 'contain'
      : 'cover';
    var currentFundraisingPlus = fundraisingPluses[index];

    if (windowWidth > 768) {
      isOpened
        ? currentFundraisingPlus.classList.remove('minus')
        : currentFundraisingPlus.classList.add('minus');

      isOpened
        ? currentFundraisingParagraph.classList.remove('open')
        : currentFundraisingParagraph.classList.add('open');
    } else {
      isOpened
        ? currentFundraisingPlus.classList.remove('minus')
        : currentFundraisingPlus.classList.add('minus');

      isOpened
        ? currentFundraisingParagraph.classList.remove('open-mobile')
        : currentFundraisingParagraph.classList.add('open-mobile');
    }
  }
});

}();
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!******************************************************************!*\
  !*** ../acf-blocks/donate-fundraising/assets/styles/styles.scss ***!
  \******************************************************************/
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

}();
/******/ })()
;
//# sourceMappingURL=donate-fundraising.js.map