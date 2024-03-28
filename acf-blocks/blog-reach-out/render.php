<?php
    $id = get_field('id');

    $heading = get_field('heading');

    $background = get_field('background');
 
?>

<section id="<?= $id ?>" data-aos="fade-up" class='reach-out'>

    <div class="reach-out__background">
        <img src="<?= $background['url'] ?>" alt="reach out">
    </div>

    <div class="container">

        <div class="reach-out__inner">

            <h2 class="reach-out__heading">

                <?= $heading ?>

            </h2>

        </div>

    </div>

</section>