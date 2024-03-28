document.addEventListener('DOMContentLoaded', function () {
  const items = document.querySelectorAll('.list .list__item');

  items.forEach(function (item, index) {
    const title = item.querySelector('.list__item__heading');
    const plusButton = item.querySelector('.list__item__plus');

    title.addEventListener('click', function () {
      toggleParagraph(index);
    });

    plusButton.addEventListener('click', function () {
      toggleParagraph(index);
    });
  });

  function toggleParagraph(index) {
    const paragraphs = document.querySelectorAll(
      '.list .list__item__paragraph'
    );
    const pluses = document.querySelectorAll('.list .list__item__plus');

    const currentParagraph = paragraphs[index];
    const currentPlus = pluses[index];

    const isOpened = currentParagraph.style.backgroundSize === 'cover';

    const windowWidth = window.innerWidth;

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
