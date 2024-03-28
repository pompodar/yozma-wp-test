<?php
    $id = get_field('id');

    $image = !empty(get_field('image')['url']) ? get_field('image')['url'] : '';

	$video = get_field('video');
    $video_background = !empty(get_field('video_background')['url']) ? get_field('video_background')['url'] : '';
?>

<section id="<?= $id ?>" data-aos="fade-up" class='video'>

    <div class="container">

        <div class="video__inner">

            <div class="video__video">

                <div id="homepage-video-play">

                </div>

                <div class="video__video__image">

                    <img src="<?= $image ?>" alt="Because Everyone Needs a Little LTC">

                </div>

                <div class="video__video__background">

                    <img src="<?= $video_background ?>" alt="LTC Who We Help Video">

                </div>

                <iframe src=" <?= $video ?>" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>

            </div>

        </div>

    </div>

</section>