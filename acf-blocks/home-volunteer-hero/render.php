<?php
    $id = get_field('id');

	$heading = get_field('heading');
	$paragraph = get_field('paragraph');
	$button_text = get_field('button_text');
	$button_link = !empty(get_field('button_link')['url']) ? get_field('button_link')['url'] : '#';
	$button_link_type = !empty(get_field('button_link_type')) ? get_field('button_link_type') : '';

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

                <?php if (!empty($button_text) && !empty($button_link)) : ?>

                <a target="<?= $button_link_type ?>" href="<?= $button_link ?>" class="hero__button">

                    <?= $button_text ?>

                </a>

                <?php endif; ?>

            </div>

            <div class="hero__row-right">

                <div class="hero__row-right__background-color">

                </div>

                <div class="hero__row-right__background-image">

                    <img src="<?= $image ?>" alt="LTC hero image">

                </div>

            </div>

        </div>

</section>