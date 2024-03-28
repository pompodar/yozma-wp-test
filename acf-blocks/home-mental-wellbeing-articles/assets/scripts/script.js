document.addEventListener('DOMContentLoaded', function () {
  const videoPlayButtons = document.querySelectorAll(
    '.article-video-play'
  );

  const closeButton = document.querySelector('.lightbox-overlay-articles .close-lightbox');

  function turnOnVideo() {
    const container = this.closest('.article__right');

    const youtubeVideo = container.querySelector(
      'iframe'
    );
  

    const modalIframe = document.querySelector(
      '.lightbox-overlay-articles iframe'
    );

    const body = document.querySelector('body');

    const lightBox = document.querySelector('.lightbox-overlay-articles');

    body.classList.add('overflow-hidden');

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
      '.lightbox-overlay-articles iframe'
    );

    const currentSrc = modalIframe.src;

    const body = document.querySelector('body');

    const lightBox = document.querySelector('.lightbox-overlay-articles');

    modalIframe.src = currentSrc.replace('&autoplay=1', '');

    body.classList.remove('overflow-hidden');

    lightBox.classList.remove('open');
  }

  if (videoPlayButtons) {
    for (let i = 0; i < videoPlayButtons.length; i++) {
      const el = videoPlayButtons[i];

      el.addEventListener('click', turnOnVideo);
    }
  }

  closeButton.addEventListener('click', turnOffVideo);
});
