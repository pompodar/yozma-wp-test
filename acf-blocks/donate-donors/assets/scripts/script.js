document.addEventListener('DOMContentLoaded', function () {

  if (!document.querySelector('#view_all')) { return; }
  const button = document.querySelector('#view_all');
  const container = document.querySelector('.donors__row-bottom');

  button.addEventListener('click', function () {
    const height = window.innerWidth > 768 ? '123rem' : '260rem';
    const padding = window.innerWidth > 768 ? '12rem 2rem' : '6rem 0';


    const isOpened =
      container.style.maxHeight !== height &&
      container.style.maxHeight !== '';

    container.style.maxHeight = isOpened
      ? height
      : 'none';
    
      container.style.padding = isOpened ? '0' : padding;


  });
});