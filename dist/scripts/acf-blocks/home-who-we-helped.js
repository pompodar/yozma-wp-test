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
  !*** ../acf-blocks/home-who-we-helped/assets/scripts/script.js ***!
  \*****************************************************************/
var swiper = new Swiper('.swiper__home-who-we-helped', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});

document.addEventListener('DOMContentLoaded', function () {
  var videoPlayButtons = document.querySelectorAll('.home-who-we-helped-video-play');  

  var closeButton = document.querySelector(
    '.lightbox-overlay-who_we_helped .close-lightbox'
  );

  function turnOnVideo() {
    var container = this.closest('.home-who-we-helped-video__video');

    var youtubeVideo = container.querySelector(
      '.home-who-we-helped-video__video iframe'
    );

    var modalIframe = document.querySelector(
      '.lightbox-overlay-who_we_helped iframe'
    );

    var body = document.querySelector('body');

    var lightBox = document.querySelector('.lightbox-overlay-who_we_helped');

    body.classList.add("overflow-hidden"); 

    modalIframe.src = youtubeVideo.src;

    var currentSrc = modalIframe.src;

    modalIframe.src = currentSrc + '&autoplay=1';

    lightBox.classList.add('open');
  }

  if (videoPlayButtons) {
    for (var i = 0; i < videoPlayButtons.length; i++) {
        var el = videoPlayButtons[i];

        el.addEventListener('click', turnOnVideo);
    }
  }

  function turnOffVideo() {
    var modalIframe = document.querySelector(
      '.lightbox-overlay-who_we_helped iframe'
    );

    var currentSrc = modalIframe.src;

    var body = document.querySelector('body');

    var lightBox = document.querySelector('.lightbox-overlay-who_we_helped');

    modalIframe.src = currentSrc.replace('&autoplay=1', '');

    body.classList.remove('overflow-hidden');

    lightBox.classList.remove("open");

  }

  if (videoPlayButtons) {
    for (var i$1 = 0; i$1 < videoPlayButtons.length; i$1++) {
      var el$1 = videoPlayButtons[i$1];

      el$1.addEventListener('click', turnOnVideo);
    }
  }

  var nextButton = document.querySelector(
    '.home-who-we-helped .swiper-button-next'
  );
  var prevButton = document.querySelector(
    '.home-who-we-helped .swiper-button-prev'
  );

  nextButton.addEventListener('click', turnOffVideo);
  prevButton.addEventListener('click', turnOffVideo);
  closeButton.addEventListener('click', turnOffVideo);

});
}();
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!******************************************************************!*\
  !*** ../acf-blocks/home-who-we-helped/assets/styles/styles.scss ***!
  \******************************************************************/
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

}();
/******/ })()
;
//# sourceMappingURL=home-who-we-helped.js.map