const swiperHomeNews = new Swiper('.swiper__home-news', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 3,
    }
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper__home-news__button-next',
    prevEl: '.swiper__home-news__button-prev',
  },
});