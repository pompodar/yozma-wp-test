<?php
    $id = get_field('id');

	$heading = get_field('heading');
	$paragraph = get_field('paragraph');
	$button_text = get_field('button_text');
	$button_link = !empty(get_field('button_link')['url']) ? get_field('button_link')['url'] : '#';
	$button_link_type = !empty(get_field('button_link_type')) ? get_field('button_link_type') : '';

	$image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '#';
	
	$card_one_heading = get_field('card_one_heading');
	$card_one_button_text = get_field('card_one_button_text');


?>

<section id="<?= $id ?>" class='get-help-hero'>

    <div class="container">

        <div class="get-help-hero__inner">

            <div class="get-help-hero__row-left">

                <h1 class="get-help-hero__heading">

                    <?= $heading ?>

                </h1>

                <div class="get-help-hero__paragraph">

                    <?= $paragraph ?>

                </div>

                <br>

                <?php if (!empty($button_text) && !empty($button_link)) : ?>

                <a target="<?= $button_link_type ?>" href="<?= $button_link ?>" class="get-help-hero__button">

                    <?= $button_text ?>

                </a>

                <?php endif; ?>

            </div>

            <div class="get-help-hero__row-right">

                <div class="get-help-hero__row-right__background-color">

                </div>

                <div class="get-help-hero__row-right__background-image">

                    <img src="<?= $image ?>" alt="LTC Get Help">

                </div>

                <div class="get-help-hero__row-right__card get-help-hero__row-right__card-one">

                    <h2 class="get-help-hero__row-right__card__heading">

                        <?= $card_one_heading ?>

                    </h2>

                    <br>

                    <div class="get-help-hero__row-right__card__paragraph">

                        <?php echo get_field('phone_number', 'option'); ?>

                    </div>

                    <br>

                    <a href="mailto:<?php echo get_field('email', 'option'); ?>"
                        class="get-help-hero__row-right__card__button">

                        <?= $card_one_button_text ?>

                    </a>

                </div>

            </div>

        </div>

</section>