<?php
    $id = get_field('id');

	$heading = get_field('heading');

    $items_repeater = get_field('items_repeater');
		
?>

<section id="<?= $id ?>" data-aos="fade-up" class='downloads'>

    <div class="container">

        <div class="downloads__inner">

            <div class="downloads__row-top">

                <h2 class="downloads__heading">

                    <?= $heading ?>

                </h2>

            </div>

            <div class="downloads__row-bottom">

                <?php if ($items_repeater) : ?>

                <?php foreach($items_repeater as $item):
                        
                        $background = !empty($item['background']['url']) ? $item['background']['url'] : '';
                        
                        $button_text = $item['button_text'];
                        $button_link = !empty($item['button_link']['url']) ? $item['button_link']['url'] : '#';

			        ?>


                <div class="downloads__row-bottom__card">

                    <div class="downloads__row-bottom__card__background">

                        <img src="<?= $background ?>" alt="Downloads">

                    </div>

                    <a target="_blank" href="<?= $button_link ?>" class="downloads__row-bottom__card__button">

                        <?= $button_text ?>

                    </a>

                </div>

                <?php endforeach; ?>

                <?php endif; ?>

            </div>

        </div>

</section>