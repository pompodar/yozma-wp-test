<?php
   $id = get_field('id');

    $items_repeater = get_field('items_repeater');
?>

<section id="<?= $id ?>" data-aos="fade-up" class='list'>

    <div class="container">

        <div class="list__inner">

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

</section>