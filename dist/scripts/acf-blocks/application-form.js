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
/*!***************************************************************!*\
  !*** ../acf-blocks/application-form/assets/scripts/script.js ***!
  \***************************************************************/
document.addEventListener('DOMContentLoaded', function () {
  var clickCount = 0;

  var videoPlayButton = document.getElementById('video-play');
  var videoBackground = document.querySelector(
    '.video__video__background'
  );

  function handleClick() {
    if (clickCount === 0) {
      var youtubeVideo = document.querySelector('.video__video iframe');
      var currentSrc = youtubeVideo.src;

      youtubeVideo.src = currentSrc + '&autoplay=1';

      videoPlayButton.classList.add('clicked');
      videoBackground.classList.add('hidden');
    }

    clickCount++;
  }

  if (videoPlayButton) {
    videoPlayButton.addEventListener('click', handleClick);
  }
});

}();
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!****************************************************************!*\
  !*** ../acf-blocks/application-form/assets/styles/styles.scss ***!
  \****************************************************************/
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

}();
/******/ })()
;
//# sourceMappingURL=application-form.js.map