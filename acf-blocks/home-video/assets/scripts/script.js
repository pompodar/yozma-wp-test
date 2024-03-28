document.addEventListener('DOMContentLoaded', function () {
  let clickCount = 0;

  const videoPlayButton = document.getElementById('homepage-video-play');
  const videoBackground = document.querySelector(
    '.video__video__background'
  );

  function handleClick() {
    if (clickCount === 0) {
      const youtubeVideo = document.querySelector('.video__video iframe');
      const currentSrc = youtubeVideo.src;

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
