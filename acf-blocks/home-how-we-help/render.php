<?php
    $id = get_field('id');

	$heading = get_field('how_we_can_help_you_block_heading', 'option');
	$paragraph = get_field('how_we_can_help_you_block_paragraph', 'option');
		
	$card_one_heading = get_field('how_we_can_help_you_block_card_one_heading', 'option');
    $card_one_background = !empty(get_field('how_we_can_help_you_block_card_one_background', 'option')['url']) ? get_field('how_we_can_help_you_block_card_one_background', 'option')['url'] : '';    
	$card_one_paragraph = get_field('how_we_can_help_you_block_card_one_paragraph', 'option');
	$card_one_button_text = get_field('how_we_can_help_you_block_card_one_button_text', 'option');
	$card_one_button_link = !empty(get_field('how_we_can_help_you_block_card_one_button_link', 'option')['url']) ? get_field('how_we_can_help_you_block_card_one_button_link', 'option')['url'] : '#';

	$card_two_heading = get_field('how_we_can_help_you_block_card_two_heading', 'option');
    $card_two_background = !empty(get_field('how_we_can_help_you_block_card_two_background', 'option')['url']) ? get_field('how_we_can_help_you_block_card_two_background', 'option')['url'] : '';    
	$card_two_paragraph = get_field('how_we_can_help_you_block_card_two_paragraph', 'option');
	$card_two_button_text = get_field('how_we_can_help_you_block_card_two_button_text', 'option');
	$card_two_button_link = !empty(get_field('how_we_can_help_you_block_card_two_button_link', 'option')['url']) ? get_field('how_we_can_help_you_block_card_two_button_link', 'option')['url'] : '#';

    $card_three_heading = get_field('how_we_can_help_you_block_card_three_heading', 'option');
    $card_three_background = !empty(get_field('how_we_can_help_you_block_card_three_background', 'option')['url']) ? get_field('how_we_can_help_you_block_card_three_background', 'option')['url'] : '';    
	$card_three_paragraph = get_field('how_we_can_help_you_block_card_three_paragraph', 'option');
	$card_three_button_text = get_field('how_we_can_help_you_block_card_three_button_text', 'option');
	$card_three_button_link = !empty(get_field('how_we_can_help_you_block_card_three_button_link', 'option')['url']) ? get_field('how_we_can_help_you_block_card_three_button_link', 'option')['url'] : '#';
?>

<section id="<?= $id ?>" data-aos="fade-up" class='how'>

    <div class="container">

        <div class="how__inner">

            <div class="how__row-top">

                <div class="how__heading">

                    <?= $heading ?>

                </div>

                <div class="how__paragraph">

                    <?= $paragraph ?>

                </div>

            </div>

            <div class="how__row-bottom">

                <a href="<?= $card_one_button_link ?>" class="how__row-bottom__card how__row-top__card-one">

                    <div class="how__row-bottom__card__background">

                        <img src="<?= $card_one_background ?>" alt="How We Can Help You">

                    </div>

                    <div class="how__row-bottom__card__background-color">

                    </div>

                    <div class="how__row-bottom__card__text">


                        <div class="how__row-bottom__card__heading">

                            <?= $card_one_heading ?>

                        </div>

                        <div class="how__row-bottom__card__paragraph">

                            <?= $card_one_paragraph ?>

                        </div>

                    </div>

                    <p class="how__row-bottom__card__button">

                        <?= $card_one_button_text ?>

                    </p>

                </a>

                <a href="<?= $card_two_button_link ?>" class="how__row-bottom__card">

                    <div class="how__row-bottom__card__background how__row-bottom__card-two__background">

                        <img src="<?= $card_two_background ?>" alt="How We Can Help You">

                    </div>

                    <div class="how__row-bottom__card__background-color">

                    </div>

                    <div class="how__row-bottom__card__text">

                        <div class="how__row-bottom__card__heading">

                            <?= $card_two_heading ?>

                        </div>

                        <div class="how__row-bottom__card__paragraph">

                            <?= $card_two_paragraph ?>

                        </div>

                    </div>

                    <p class="how__row-bottom__card__button">

                        <?= $card_two_button_text ?>

                    </p>

                </a>

                <a href="<?= $card_three_button_link ?>" class="how__row-bottom__card">

                    <div class="how__row-bottom__card__background how__row-bottom__card-three__background">

                        <img src="<?= $card_three_background ?>" alt="How We Can Help You">

                    </div>

                    <div class="how__row-bottom__card__background-color">

                    </div>

                    <div class="how__row-bottom__card__text">

                        <div class="how__row-bottom__card__heading">

                            <?= $card_three_heading ?>

                        </div>

                        <div class="how__row-bottom__card__paragraph">

                            <?= $card_three_paragraph ?>

                        </div>

                    </div>

                    <p class="how__row-bottom__card__button">

                        <?= $card_three_button_text ?>

                    </p>

                </a>

            </div>

        </div>

    </div>

</section>