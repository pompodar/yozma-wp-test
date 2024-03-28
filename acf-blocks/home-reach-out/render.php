<?php
    $id = get_field('id');

    $heading = get_field('heading');

    $background = !empty(get_field('background')['url']) ? get_field('background')['url'] : '';
 
?>

<section id="<?= $id ?>" data-aos="fade-up" class='reach-out'>

    <div class="reach-out__background">
        <img src="<?= $background ?>" alt="Reach Out">
    </div>

    <div class="container">

        <div class="reach-out__inner">

            <h2 class="reach-out__heading">

                <?= $heading ?>

            </h2>

        </div>

    </div>

</section>