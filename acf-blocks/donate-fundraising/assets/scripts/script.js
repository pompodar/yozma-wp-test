document.addEventListener('DOMContentLoaded', function () {
  const fundraisingItems = document.querySelectorAll(
    '.fundraising .list__item'
  );

  fundraisingItems.forEach(function (item, index) {
    const title = item.querySelector('.list__item__heading');
    const plusButton = item.querySelector('.list__item__plus');

    title.addEventListener('click', function () {
      toggleFundraisingParagraph(index);
    });

    plusButton.addEventListener('click', function () {
      toggleFundraisingParagraph(index);
    });
  });

  function toggleFundraisingParagraph(index) {
    const fundraisingParagraphs = document.querySelectorAll(
      '.fundraising .list__item__paragraph'
    );
    const fundraisingPluses = document.querySelectorAll(
      '.fundraising .list__item__plus'
    );

    const currentFundraisingParagraph = fundraisingParagraphs[index];
    const isOpened =
      currentFundraisingParagraph.style.backgroundSize === 'cover';

    const windowWidth = window.innerWidth;

    currentFundraisingParagraph.style.backgroundSize = isOpened
      ? 'contain'
      : 'cover';
    const currentFundraisingPlus = fundraisingPluses[index];

    if (windowWidth > 768) {
      isOpened
        ? currentFundraisingPlus.classList.remove('minus')
        : currentFundraisingPlus.classList.add('minus');

      isOpened
        ? currentFundraisingParagraph.classList.remove('open')
        : currentFundraisingParagraph.classList.add('open');
    } else {
      isOpened
        ? currentFundraisingPlus.classList.remove('minus')
        : currentFundraisingPlus.classList.add('minus');

      isOpened
        ? currentFundraisingParagraph.classList.remove('open-mobile')
        : currentFundraisingParagraph.classList.add('open-mobile');
    }
  }
});
