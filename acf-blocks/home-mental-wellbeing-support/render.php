<?php
    $id = get_field('id');

    $image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '';

	$heading = get_field('heading');
    
	$paragraph_one = get_field('paragraph_one');
    $paragraph_two = get_field('paragraph_two');
    $paragraph_three = get_field('paragraph_three');
    
	$button_one_text = get_field('button_one_text');
	$button_one_link = !empty(get_field('button_one_link')['url']) ? get_field('button_one_link')['url'] : '';
	$button_one_link_type = !empty(get_field('button_one_link_type')) ? get_field('button_link_type') : '';

?>

<section id="<?= $id ?>" data-aos="fade-up" class='support'>

    <div class="container">

        <div class="support__inner">

            <div class="support__row-left">

                <div class="support__row-left__background-color">

                </div>

                <div class="support__row-left__background-image">

                    <img src="<?= $image ?>" alt="LTC hero image">

                </div>

            </div>

            <div class="support__row-right">

                <h2 class="support__heading">

                    <?= $heading ?>

                </h2>

                <div class="support__paragraph support__paragraph">

                    <?= $paragraph_one ?>

                </div>

                <div class="support__paragraph support__paragraph-two">

                    <?= $paragraph_two ?>

                </div>

                <div class="support__paragraph support__paragraph-three">

                    <?= $paragraph_three ?>

                </div>

                <?php if (!empty($button_one_text)) : ?>

                <div class="support__buttons">

                    <a target="<?= $button_one_link_type ?>" href="<?= $button_one_link ?>" class="support__button">

                        <?= $button_one_text ?>

                    </a>

                </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>