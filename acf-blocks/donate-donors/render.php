<?php
    $id = get_field('id');

	$heading = get_field('heading');
	$paragraph = get_field('paragraph');
		
    $items_repeater = get_field('items_repeater');
?>

<section id="<?= $id ?>" data-aos="fade-up" class='donors' id="donors-we-help">

    <div class="container">

        <div class="donors__inner">

            <div class="donors__row-top">

                <h2 class="donors__heading">

                    <?= $heading ?>

                </h2>

                <?php if ($items_repeater) : ?>


                <div class="donors__paragraph">

                    <?= $paragraph ?>

                </div>

                <?php endif; ?>

            </div>

            <div class="donors__row-bottom">

                <?php if ($items_repeater) : ?>

                <?php

                foreach ($items_repeater as $index => $item) :

                    $image = !empty($item['image']['url']) ? $item['image']['url'] : '';
                                        
                    $link = !empty($item['link']['url']) ? $item['link']['url'] : '';

            ?>

                <div class="list__item">


                    <a target="_blank" href="<?= $link ?>">

                        <img src="<?= $image ?>" alt="Donor">

                    </a>

                </div>

                <?php endforeach; ?>

                <?php endif; ?>

            </div>

            <?php if (count($items_repeater) > 6) : ?>

            <div class="donors__more-button">

                <p id="view_all" class="donors__more-button__inner">

                    View All Supporters

                </p>

            </div>

            <?php endif; ?>

        </div>

</section>