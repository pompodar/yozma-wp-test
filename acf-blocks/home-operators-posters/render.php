<?php
    $id = get_field('id');

    $image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '';

	$heading = get_field('heading');
    
	$paragraph_one = get_field('paragraph_one');
    
    $items_repeater = get_field('items_repeater');

    $paragraph_two = get_field('paragraph_two');

	$button_one_text = get_field('button_one_text');
	$button_one_link = !empty(get_field('button_one_link')['url']) ? get_field('button_one_link')['url'] : '#';
    $button_one_link_type = !empty(get_field('button_one_link_type')) ? get_field('button_one_link_type') : '';
?>

<section id="<?= $id ?>" data-aos="fade-up" class='posters'>

    <div class="container">

        <div class="posters__inner">

            <div class="posters__row-left">

                <div class="posters__row-left__background-color">

                </div>

                <div class="posters__row-left__background-image">

                    <img src="<?= $image ?>" alt="LTC hero image">

                </div>

            </div>

            <div class="posters__row-right">

                <h2 class="posters__heading">

                    <?= $heading ?>

                </h2>

                <div class="posters__paragraph posters__paragraph">

                    <?= $paragraph_one ?>

                </div>

                <?php if ($items_repeater) : ?>

                <ul class='posters__list'>

                    <?php foreach($items_repeater as $item):
                        
                        $item = $item['list__item'];

			        ?>

                    <li class='posters__list__item'>

                        <?= $item ?>

                    </li>

                    <?php endforeach; ?>

                </ul>

                <?php endif; ?>

                <div class="posters__paragraph posters__paragraph-two">

                    <?= $paragraph_two ?>

                </div>

                <?php if (!empty($button_one_text)) : ?>

                <div class="posters__buttons">

                    <a target="<?= $button_one_link_type ?>" href="<?= $button_one_link ?>" class="posters__button">

                        <?= $button_one_text ?>

                    </a>

                </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>