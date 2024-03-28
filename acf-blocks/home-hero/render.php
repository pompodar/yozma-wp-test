<?php
    $id = get_field('id');

	$heading = get_field('heading');
	$paragraph = get_field('paragraph');
	$button_text = get_field('button_text');
	$button_link = !empty(get_field('button_link')['url']) ? get_field('button_link')['url'] : '#';
    $button_link_type = !empty(get_field('button_link_type')) ? get_field('button_link_type') : '';

	$image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '';
	
	$card_one_heading = get_field('card_one_heading');
	$card_one_paragraph = get_field('card_one_paragraph');
	$card_one_button_text = get_field('card_one_button_text');
	$card_one_button_link = !empty(get_field('card_one_button_link')['url']) ? get_field('card_one_button_link')['url'] : '#';
    $card_one_button_link_type = !empty(get_field('card_one_button_link_type')) ? get_field('card_one_button_link_type') : '';
    
	$card_two_heading = get_field('card_two_heading');
	$card_two_paragraph = get_field('card_two_paragraph');
	$card_two_button_text = get_field('card_two_button_text');
	$card_two_button_link = !empty(get_field('card_two_button_link')['url']) ? get_field('card_two_button_link')['url'] : '#';
    $card_two_button_link_type = !empty(get_field('card_two_button_link_type')) ? get_field('card_two_button_link_type') : '';

?>

<section id="<?= $id ?>" class='home-hero'>

    <div class="container">

        <div class="home-hero__inner">

            <div class="home-hero__row-left">

                <h1 class="home-hero__heading">

                    <?= $heading ?>

                </h1>

                <div class="home-hero__paragraph">

                    <?= $paragraph ?>

                </div>

                <br>

                <?php if (!empty($button_text) && !empty($button_link)) : ?>

                <a target="<?= $button_link_type ?>" href="<?= $button_link ?>" class="home-hero__button">

                    <?= $button_text ?>

                </a>

                <?php endif; ?>

            </div>

            <div class="home-hero__row-right">

                <div class="home-hero__row-right__background-color">

                </div>

                <div class="home-hero__row-right__background-image">

                    <img src="<?= $image ?>" alt="LTC Hero Image">

                </div>

                <div class="home-hero__row-right__card home-hero__row-right__card-one">

                    <h3 class="home-hero__row-right__card__heading">

                        <?= $card_one_heading ?>

                    </h3>

                    <div class="home-hero__row-right__card__paragraph">

                        <?= $card_one_paragraph ?>

                    </div>

                    <br>

                    <?php if (!empty($card_one_button_text) && !empty($card_one_button_link)) : ?>

                    <a target="<?= $card_one_button_link_type ?>" href="<?= $card_one_button_link ?>"
                        class="home-hero__row-right__card__button">

                        <?= $card_one_button_text ?>

                    </a>

                    <?php endif; ?>

                </div>

                <div class="home-hero__row-right__card">

                    <h3 class="home-hero__row-right__card__heading">

                        <?= $card_two_heading ?>

                    </h3>

                    <div class="home-hero__row-right__card__paragraph">

                        <?= $card_two_paragraph ?>

                    </div>

                    <br>

                    <?php if (!empty($card_two_button_text) && !empty($card_two_button_link)) : ?>

                    <a target="<?= $card_two_button_link_type ?>" href="<?= $card_two_button_link ?>"
                        class="home-hero__row-right__card__button">

                        <?= $card_two_button_text ?>

                    </a>

                    <?php endif; ?>

                </div>

            </div>

        </div>

</section>