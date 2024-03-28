$(document).ready(function () {
  $('.how__row-bottom__card__text').each(function () {
    const $textElement = $(this);
    const $siblingBackground = $textElement.prev();

    // Get the height of the text element
    const blockHeight = $textElement.height() / 150;

    let difference = blockHeight - 1;

    // Adjust difference to be within a specific range
    difference = difference < 0 ? difference + 0.2 : difference - 0.;

    console.log(difference);

    // Set the clip-path based on the height
    const clipPath = `polygon(0px ${46 - difference * 46}%, 100% ${
      49 - difference * 49
    }%, 100% 100%, 0px 100%)`;

    // Use jQuery to set the clipPath property
    $siblingBackground.css('clip-path', clipPath);
  });
});
