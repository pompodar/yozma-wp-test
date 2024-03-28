const swiper = new Swiper('.swiper__home-who-we-helped', {
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
  const videoPlayButtons = document.querySelectorAll('.home-who-we-helped-video-play');  

  const closeButton = document.querySelector(
    '.lightbox-overlay-who_we_helped .close-lightbox'
  );

  function turnOnVideo() {
    const container = this.closest('.home-who-we-helped-video__video');

    const youtubeVideo = container.querySelector(
      '.home-who-we-helped-video__video iframe'
    );

    const modalIframe = document.querySelector(
      '.lightbox-overlay-who_we_helped iframe'
    );

    const body = document.querySelector('body');

    const lightBox = document.querySelector('.lightbox-overlay-who_we_helped');

    body.classList.add("overflow-hidden"); 

    modalIframe.src = youtubeVideo.src;

    const currentSrc = modalIframe.src;

    modalIframe.src = currentSrc + '&autoplay=1';

    lightBox.classList.add('open');
  }

  if (videoPlayButtons) {
    for (let i = 0; i < videoPlayButtons.length; i++) {
        const el = videoPlayButtons[i];

        el.addEventListener('click', turnOnVideo);
    }
  }

  function turnOffVideo() {
    const modalIframe = document.querySelector(
      '.lightbox-overlay-who_we_helped iframe'
    );

    const currentSrc = modalIframe.src;

    const body = document.querySelector('body');

    const lightBox = document.querySelector('.lightbox-overlay-who_we_helped');

    modalIframe.src = currentSrc.replace('&autoplay=1', '');

    body.classList.remove('overflow-hidden');

    lightBox.classList.remove("open");

  }

  if (videoPlayButtons) {
    for (let i = 0; i < videoPlayButtons.length; i++) {
      const el = videoPlayButtons[i];

      el.addEventListener('click', turnOnVideo);
    }
  }

  const nextButton = document.querySelector(
    '.home-who-we-helped .swiper-button-next'
  );
  const prevButton = document.querySelector(
    '.home-who-we-helped .swiper-button-prev'
  );

  nextButton.addEventListener('click', turnOffVideo);
  prevButton.addEventListener('click', turnOffVideo);
  closeButton.addEventListener('click', turnOffVideo);

});