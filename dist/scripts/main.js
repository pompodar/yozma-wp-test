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
/*!*************************!*\
  !*** ./scripts/main.js ***!
  \*************************/
document.addEventListener('DOMContentLoaded', function () {
  // hamburger

  // const mobileMenuButton = document.querySelector('.header__mobile__hamburger');
  // const navList = document.querySelector('.header__mobile__bottom');

  // mobileMenuButton.addEventListener('click', function () {
  //   mobileMenuButton.classList.toggle('open');
  //   navList.classList.toggle('show');
  //   document.body.classList.toggle('overflow-hidden');
  // });

  // // menu
  // const menuItems = document.querySelectorAll(
  //   '.header__mobile__nav nav > ul > li'
  // );

  // // Declare the openMenu function first
  // const openMenu = function (event) {
  //   event.preventDefault();

  //   const submenuElement = this.querySelector('.sub-menu');

  //   submenuElement.classList.toggle('open');

  //   this.removeEventListener('click', openMenu);
  // };

  // for (let index = 0; index < menuItems.length; index++) {
  //   const menuItem = menuItems[index];

  //   if (menuItem.querySelector('.sub-menu')) {
  //     menuItem.addEventListener('click', openMenu);
  //   }
  // }

  // header on scroll

  // window.addEventListener('scroll', function () {
  //   const header = document.querySelector('header.header');
  //   const scrollPosition = window.scrollY;

  //   const headerHeight = header.offsetHeight;

  //   if (scrollPosition > headerHeight) {
  //     header.classList.add('scrolled');
  //   } else {
  //     header.classList.remove('scrolled');
  //   }
  // });

  // anchoring
  var links = document.querySelectorAll('a[href^="#"]');

  for (var index = 0; index < links.length; index++) {
    var link = links[index];

    link.addEventListener('click', function (e) {
      e.preventDefault();

      var headerHeight = document.getElementById('header').offsetHeight;
      var bannerHeight = document.getElementById('banner')
        ? document.getElementById('banner').offsetHeight
        : 0;

      var target = document.getElementById(
        this.getAttribute('href').substring(1)
      );

      var self = this;

        // Reset the hover effect (change this to the initial state)
        self.classList.remove('no-hover');


      setTimeout(function () {

        // Reset the hover effect (change this to the initial state)
        self.classList.add("no-hover");

      }, 1000);


      if (target) {
        var targetOffset = target.offsetTop - headerHeight - bannerHeight;

        window.scrollTo({
          top: targetOffset,
          behavior: 'smooth',
        });
      }
    });
  }

  // fading out
  // AOS.init();

    // Get all wishlist buttons
    var wishlistBtns = document.querySelectorAll('.add_to_wishlist');

    // Loop through each wishlist button and attach event listener
    wishlistBtns.forEach(function(btn) {

      // Check if product is already in wishlist
      var productLink = btn.closest('li.product').querySelector('.product_type_variable');

      console.log(productLink);

      var variations = btn.closest('li.product').querySelectorAll('.variation-slug');

      var parent = document.createElement("div");

      parent.classList.add("variations");

      variations.forEach(function(variation) {

        var variationImage = variation.closest('.variation-data-wrapper').querySelector('.variation-image img').src;

        console.log(variation.textContent);

        var button = document.createElement("button");
        button.style.backgroundColor = variation.textContent;
        button.classList.add("variation");

        button.addEventListener("click", function() {
          var variationButtons = btn.closest('li.product').querySelectorAll(".variation");

          // Remove "active" class from all buttons
          variationButtons.forEach(function(btn) {
              btn.classList.remove("active");
          });

          var prodImage = btn.closest('li.product').querySelector('.attachment-woocommerce_thumbnail');

          prodImage.src = variationImage;
          
          // Add "active" class to the clicked button
          button.classList.add("active");
      });

        var prod = btn.closest('li.product');
        parent.appendChild(button);

        prod.appendChild(parent);

      })

      // Get product ID from data-product_id attribute of the sibling <a> tag
      var productId = productLink.dataset.product_id;
      
      console.log(productId);
      
      if (isProductInWishlist(productId)) {
          btn.classList.add('in-wishlist');
      }

        btn.addEventListener('click', function() {
            // Find the parent li element
            var productLink = btn.closest('li.product').querySelector('.product_type_variable');

            // Get product ID from data-product_id attribute of the sibling <a> tag
            var productId = productLink.dataset.product_id;

            // Check if product is already in wishlist
            if (isProductInWishlist(productId)) {
              
              removeFromWishlist(productId);

              btn.classList.remove('in-wishlist');

            } else {
                // Add product ID to the wishlist in local storage
                addToWishlist(productId);

                btn.classList.add('in-wishlist');

            }
        });
    });

    // Function to check if product is already in wishlist
    function isProductInWishlist(productId) {
        // Get current wishlist items from local storage or initialize as empty array
        var wishlistItems = JSON.parse(localStorage.getItem('wishlist')) || [];
        
        // Check if the product ID is in the wishlist
        return wishlistItems.includes(productId);
    }

    function removeFromWishlist(productId) {
      // Get current wishlist items from local storage or initialize as empty array
      var wishlistItems = JSON.parse(localStorage.getItem('wishlist')) || [];

      // Find the index of the product ID in the wishlist
      var index = wishlistItems.indexOf(productId);
      
      // Remove the product ID from the wishlist
      if (index !== -1) {
          wishlistItems.splice(index, 1);
      }

      // Save the updated wishlist to local storage
      localStorage.setItem('wishlist', JSON.stringify(wishlistItems));
    }

    // Function to add product to the wishlist in local storage
    function addToWishlist(productId) {
        // Get current wishlist items from local storage or initialize as empty array
        var wishlistItems = JSON.parse(localStorage.getItem('wishlist')) || [];

        // Add the product ID to the wishlist
        wishlistItems.push(productId);

        // Save the updated wishlist to local storage
        localStorage.setItem('wishlist', JSON.stringify(wishlistItems));
    }
});

}();
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!**************************!*\
  !*** ./styles/main.scss ***!
  \**************************/
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

}();
/******/ })()
;
//# sourceMappingURL=main.js.map