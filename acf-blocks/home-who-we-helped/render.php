<?php
    $id = get_field('id');

	$heading = get_field('heading');
	$paragraph = get_field('paragraph');

    $background = !empty(get_field('background')['url']) ? get_field('background')['url'] : '';

    $items_repeater = get_field('items_repeater');
?>

<div class="lightbox-overlay-who_we_helped">
    <div class="lightbox-content">
        <span class="close-lightbox">&times;</span>
        <iframe src="" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </div>
</div>

<section id="<?= $id ?>" data-aos="fade-up" class='home-who-we-helped'>

    <div class="home-who-we-helped__background">

        <img src="<?= $background ?>" alt="background">

    </div>

    <div class="container">

        <div class="home-who-we-helped__inner">

            <div class="home-who-we-helped__row-top">

                <div class="home-who-we-helped__heading">

                    <?= $heading ?>

                </div>

                <div class="home-who-we-helped__paragraph">

                    <?= $paragraph ?>

                </div>

            </div>

            <div class="swiper__home-who-we-helped">

                <div class="swiper-wrapper">

                    <?php if ($items_repeater) : ?>

                    <?php foreach($items_repeater as $item):
                        $video = !empty($item['video']) ? $item['video'] : '';
                        $video_background = !empty($item['video_background']['url']) ? $item['video_background']['url'] : '';
                        $video_heading = $item['video_heading'];
                        $video_paragraph = $item['video_paragraph'];
			        ?>

                    <div class="home-who-we-helped__row-bottom swiper-slide">

                        <div class="home-who-we-helped-video__video">

                            <div class="home-who-we-helped-video-play">

                            </div>

                            <div class="home-who-we-helped-video__video__background">

                                <img src="<?= $video_background ?>" alt="Who We Helped">

                            </div>

                            <iframe src=" <?= $video ?>" title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>

                        </div>

                        <div class="home-who-we-helped-video__text">

                            <div class="home-who-we-helped-video__text__heading">

                                <?= $video_heading ?>

                            </div>

                            <div class="home-who-we-helped-video__text__paragraph">

                                <?= $video_paragraph ?>

                            </div>

                        </div>

                    </div>

                    <?php endforeach; ?>


                    <?php endif; ?>

                </div>

                <div class="swiper-button-prev"></div>

                <div class="swiper-button-next"></div>

            </div>

        </div>

    </div>

</section>