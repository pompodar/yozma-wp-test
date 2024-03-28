<?php
    $id = get_field('id');

	$video = get_field('video');
    $video_background = !empty(get_field('video_background')['url']) ? get_field('video_background') : '';
?>

<section class='video' id="<?= $id ?>">

    <div class="container">

        <div class="video__inner">

            <div class="video__video">

                <div id="video-play">

                </div>

                <div class="video__video__background">

                    <img src="<?= $video_background ?>" alt="video background">

                </div>

                <iframe src=" <?= $video ?>" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>

            </div>

        </div>

    </div>

</section>