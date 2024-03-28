<?php
    $id = get_field('id');
	
    $card_one_heading = get_field('card_one_heading');	
    $card_one_paragraph = get_field('card_one_paragraph');
    $card_one_image = !empty(get_field('card_one_image')['url']) ? get_field('card_one_image')['url'] : '';		
    $card_one_button_text = get_field('card_one_button_text');	
    $card_one_button_link = !empty(get_field('card_one_button_link')['url']) ? get_field('card_one_button_link')['url'] : '';	

    $card_two_heading = get_field('card_two_heading');	
    $card_two_paragraph = get_field('card_two_paragraph');	
    $card_two_image = !empty(get_field('card_two_image')['url']) ? get_field('card_one_image')['url'] : '';		
    $card_two_button_text = get_field('card_two_button_text');	
    $card_two_button_link = !empty(get_field('card_two_button_link')['url']) ? get_field('card_one_button_link')['url'] : '';	

?>

<section id="<?= $id ?>" data-aos="fade-up" class='cards'>

    <div class="container">

        <div class="cards__inner">

            <div class="cards__card">

                <div class="cards__left">

                    <h2 class="cards__card__heading">

                        <?= $card_one_heading ?>

                    </h2>

                    <br>

                    <div class="cards__card__paragraph">

                        <?= $card_one_paragraph ?>

                    </div>

                    <a href="<?= $card_one_button_link ?>" class="cards__card__button">

                        <?= $card_one_button_text ?>

                    </a>

                </div>

                <div class="cards__right">

                    <img src="<?= $card_one_image ?>" alt="Get Help">

                </div>

            </div>

            <div class="cards__card">

                <div class="cards__left">

                    <div class="cards__card__heading">

                        <?= $card_two_heading ?>

                    </div>

                    <br>

                    <div class=" cards__card__paragraph">

                        <?= $card_two_paragraph ?>

                    </div>

                    <a href="<?= $card_two_button_link ?>" class="cards__card__button">

                        <?= $card_two_button_text ?>

                    </a>

                </div>

                <div class="cards__right">

                    <img src="<?= $card_two_image ?>" alt="Operators">

                </div>

            </div>

        </div>

    </div>

</section>