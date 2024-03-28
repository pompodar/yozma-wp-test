<?php
    $id = get_field('id');

    $image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '';
	
    $heading = get_field('heading');

    $link = !empty(get_field('link')['url']) ? get_field('link')['url'] : '#';
    $link_text = get_field('link_text');
    
	$button_text = get_field('button_text');
	$button_link = !empty(get_field('button_link')['url']) ? get_field('button_link')['url'] : '#';
?>

<section id="<?= $id ?>" data-aos="fade-up" class='home-find-out'>

    <div class="home-find-out__background"></div>

    <div class="container">

        <div class="home-find-out__inner">

            <div class="home-find-out__image">

                <img src="<?= $image ?>" alt="Find Out">

            </div>

            <h2 class="home-find-out__heading">

                <?= $heading ?>

                <a href="<?= $link ?>"><?= $link_text ?></a>

            </h2>


            <a href="<?= $button_link ?>" class="home-find-out__button">

                <?= $button_text ?>

            </a>


        </div>

    </div>

</section>