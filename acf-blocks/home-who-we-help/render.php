<?php
    $id = get_field('id');

    $image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '';

	$heading = get_field('heading');
    
	$paragraph_one = get_field('paragraph_one');
    $paragraph_two = get_field('paragraph_two');
    
	$button_one_text = get_field('button_one_text');
	$button_one_link = !empty(get_field('button_one_link')['url']) ? get_field('button_one_link')['url'] : '#';
	$button_one_link_type = !empty(get_field('button_one_link_type')) ? get_field('button_one_link_type') : '';

    $button_two_text = get_field('button_two_text');
	$button_two_link = !empty(get_field('button_two_link')['url']) ? get_field('button_two_link')['url'] : '#';
	$button_two_link_type = !empty(get_field('button_two_link_type')) ? get_field('button_two_link_type') : '';

?>

<section id="<?= $id ?>" data-aos="fade-up" class='who'>

    <div class=" container">

        <div class="who__inner">

            <div class="who__row-left">

                <div class="who__row-left__background-color">

                </div>

                <div class="who__row-left__background-image">

                    <img src="<?= $image ?>" alt="LTC Who We Help">

                </div>

            </div>

            <div class="who__row-right">

                <h2 class="who__heading">

                    <?= $heading ?>

                </h2>

                <div class="who__paragraph who__paragraph">

                    <?= $paragraph_one ?>

                </div>

                <div class="who__paragraph who__paragraph-two">

                    <?= $paragraph_two ?>

                </div>

                <?php if (!empty(get_field('button_two_text')) || !empty(get_field('button_one_text'))) : ?>

                <div class="who__buttons">

                    <?php if (!empty(get_field('button_one_text')) || !empty(get_field('button_one_link'))) : ?>

                    <a target="<?= $button_one_link_type ?>" href="<?= $button_one_link ?>" class="who__button">

                        <?= $button_one_text ?>

                    </a>

                    <?php endif; ?>


                    <?php if (!empty(get_field('button_two_text'))) : ?>

                    <a target="<?= $button_two_link_type ?>" href="<?= $button_two_link ?>" class="who__button">

                        <?= $button_two_text ?>

                    </a>

                    <?php endif; ?>

                </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>