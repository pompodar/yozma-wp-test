<?php
    $id = get_field('id');

	$heading = get_field('heading');
	$paragraph = get_field('paragraph');
    
	$button_one_text = get_field('button_one_text');
	$button_one_link = !empty(get_field('button_one_link')['url']) ? get_field('button_one_link')['url'] : '#';
    $button_one_link_type = !empty(get_field('button_one_link_type')) ? get_field('button_one_link_type') : '';

    $button_two_text = get_field('button_two_text');
	$button_two_link = !empty(get_field('button_two_link')['url']) ? get_field('button_two_link')['url'] : '#';
	$button_two_link_type = !empty(get_field('button_two_link_type')) ? get_field('button_two_link_type') : '';

	$image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '';
	
?>

<section id="<?= $id ?>" class='hero'>

    <div class="container">

        <div class="hero__inner">

            <div class="hero__row-left">

                <h1 class="hero__heading">

                    <?= $heading ?>

                </h1>

                <div class="hero__paragraph">

                    <?= $paragraph ?>

                </div>

                <br>

                <?php if (!empty(get_field('button_one_text'))) : ?>


                <a target="<?= $button_one_link_type ?>" href="<?= $button_one_link ?>" class="hero__button">

                    <?= $button_one_text ?>

                </a>

                <?php endif; ?>

                <?php if (!empty(get_field('button_two_text'))) : ?>

                <a target="<?= $button_two_link_type ?>" href="<?= $button_two_link ?>" class="hero__button">

                    <?= $button_two_text ?>

                </a>

                <?php endif; ?>

            </div>

            <div class="hero__row-right">

                <div class="hero__row-right__background-color">

                </div>

                <div class="hero__row-right__background-image">

                    <img src="<?= $image ?>" alt="LTC Contact">

                </div>

            </div>

        </div>

</section>