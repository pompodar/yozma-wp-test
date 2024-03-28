<?php
    $id = get_field('id');

    $image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '';

	$heading = get_field('heading');
    
	$paragraph_one = get_field('paragraph_one');
    $paragraph_two = get_field('paragraph_two');
    $paragraph_three = get_field('paragraph_three');
    $paragraph_four = get_field('paragraph_four');
    
	$button_one_text = get_field('button_one_text');
	$button_one_link = !empty(get_field('button_one_link')['url']) ? get_field('button_one_link')['url'] : '#';
	$button_one_link_type = !empty(get_field('button_one_link_type')) ? get_field('button_one_link_type') : '';

?>

<section id="<?= $id ?>" data-aos="fade-up" class='get-involved'>

    <div class="container">

        <div class="get-involved__inner">

            <div class="get-involved__row-left">

                <div class="get-involved__row-left__background-color">

                </div>

                <div class="get-involved__row-left__background-image">

                    <img src="<?= $image ?>" alt="LTC hero image">

                </div>

            </div>

            <div class="get-involved__row-right">

                <h2 class="get-involved__heading">

                    <?= $heading ?>

                </h2>

                <div class="get-involved__paragraph get-involved__paragraph">

                    <?= $paragraph_one ?>

                </div>

                <div class="get-involved__paragraph get-involved__paragraph-two">

                    <?= $paragraph_two ?>

                </div>

                <div class="get-involved__paragraph get-involved__paragraph-three">

                    <?= $paragraph_three ?>

                </div>

                <div class="get-involved__paragraph get-involved__paragraph-four">

                    <?= $paragraph_four ?>

                </div>

                <?php if (!empty($button_one_text)) : ?>

                <div class="get-involved__buttons">

                    <a target="<?= $button_one_link_type ?>" href="<?= $button_one_link ?>"
                        class="get-involved__button">

                        <?= $button_one_text ?>

                    </a>

                </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>