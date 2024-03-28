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
/*!**********************************************************!*\
  !*** ../acf-blocks/donate-list/assets/scripts/script.js ***!
  \**********************************************************/
document.addEventListener('DOMContentLoaded', function () {
  var items = document.querySelectorAll('.list .list__item');

  items.forEach(function (item, index) {
    var title = item.querySelector('.list__item__heading');
    var plusButton = item.querySelector('.list__item__plus');

    title.addEventListener('click', function () {
      toggleParagraph(index);
    });

    plusButton.addEventListener('click', function () {
      toggleParagraph(index);
    });
  });

  function toggleParagraph(index) {
    var paragraphs = document.querySelectorAll(
      '.list .list__item__paragraph'
    );
    var pluses = document.querySelectorAll('.list .list__item__plus');

    var currentParagraph = paragraphs[index];
    var currentPlus = pluses[index];

    var isOpened = currentParagraph.style.backgroundSize === 'cover';

    var windowWidth = window.innerWidth;

    currentParagraph.style.backgroundSize = isOpened ? 'contain' : 'cover';

    if (windowWidth > 768) {
      isOpened
        ? currentPlus.classList.remove('minus')
        : currentPlus.classList.add('minus');

      isOpened
        ? currentParagraph.classList.remove('open')
        : currentParagraph.classList.add('open');
    } else {
      isOpened
        ? currentPlus.classList.remove('minus')
        : currentPlus.classList.add('minus');

      isOpened
        ? currentParagraph.classList.remove('open-mobile')
        : currentParagraph.classList.add('open-mobile');
    }
  }
});

}();
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!***********************************************************!*\
  !*** ../acf-blocks/donate-list/assets/styles/styles.scss ***!
  \***********************************************************/
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

}();
/******/ })()
;
//# sourceMappingURL=donate-list.js.map