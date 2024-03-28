<?php
    $id = get_field('id');

    $image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '';

	$heading = get_field('heading');
    
	$paragraph_one = get_field('paragraph_one');
    $paragraph_two = get_field('paragraph_two');
    $paragraph_three = get_field('paragraph_three');

    $image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '';

    $items_repeater = get_field('items_repeater');
    
?>

<section id="<?= $id ?>" data-aos="fade-up" class='fundraising'>

    <div class="container">

        <div class="fundraising__inner">

            <div class="fundraising__row-left">

                <h2 class="fundraising__heading">

                    <?= $heading ?>

                </h2>

                <div class="fundraising__paragraph fundraising__paragraph">

                    <?= $paragraph_one ?>

                </div>

                <div class="fundraising__paragraph fundraising__paragraph-two">

                    <?= $paragraph_two ?>

                </div>

                <div class="fundraising__paragraph fundraising__paragraph-three">

                    <?= $paragraph_three ?>

                </div>

                <div class="fundraising__image">

                    <img src="<?= $image ?>" alt="Fundraising">

                </div>

            </div>

            <div class="fundraising__row-right">

                <?php if ($items_repeater) : ?>

                <?php

                        foreach ($items_repeater as $index => $item) :

                            $heading = $item['heading'];

                            $paragraph = $item['paragraph'];
                    ?>

                <div class="list__item">

                    <div class="list__item__visual">

                        <h3 class="list__item__heading">

                            <?= $heading ?>

                        </h3>

                        <button data-index="<?= $index ?>" class="list__item__plus"></button>

                    </div>

                    <div class="list__item__paragraph">

                        <?= $paragraph ?>

                    </div>

                </div>

                <?php endforeach; ?>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>