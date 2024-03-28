<?php
    $id = get_field('id');

    $heading = get_field('heading');

    $paragraph = get_field('paragraph');

    $background = !empty(get_field('background')['url']) ? get_field('background')['url'] : '';
 
?>

<section id="<?= $id ?>" data-aos="fade-up" class='helpline'>

    <div class="helpline__background">
        <img src="<?= $background ?>" alt="Help Line">
    </div>

    <div class="container">

        <div class="helpline__inner">

            <h2 class="helpline__heading">

                <?= $heading ?>
            </h2>

            <div class="helpline__paragraph"><?= $paragraph ?></div>

        </div>

    </div>

</section>