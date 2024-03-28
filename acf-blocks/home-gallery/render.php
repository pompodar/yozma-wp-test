<?php
    $id = get_field('id');

    $heading = get_field('heading');

    $photos_count = wp_is_mobile() ? 6 : 5;

    $accessToken = 'IGQWRPaUpTSU1VSGNCSGpHTm1Ya2Y2S1dmeHliRi1pbVVhZA2NxdXltdjJac0pSaEFFVG1JVVRPVTlqT29VMGJaSVlSQUxyR3NqeTA2LVdiUmJscUtabGIwcFotVkdWb0stR3dmY0ZAGU0tpM3BxRllIMGhUT013REkZD';

    $url = "https://graph.instagram.com/v12.0/me/media?fields=id,caption,media_type,media_url,permalink,timestamp&access_token={$accessToken}";

    $response = file_get_contents($url);
    $data = json_decode($response, true);

?>

<section id="<?= $id ?>" data-aos="fade-up" class='gallery'>

    <div class="container">

        <div class="gallery__inner">

            <div class="gallery__row-top">

                <div class="gallery__heading"><?= $heading ?></div>

            </div>

            <?php if ($data) : ?>

            <div class="swiper__gallery">

                <div class="gallery__row-bottom swiper-wrapper">

                    <?php

                        $counter = 0;

                        foreach ($data['data'] as $item) :
                            
                    ?>

                    <?php if ($item['media_type'] ==='IMAGE' ) : ?>

                    <?php   $photo = !empty($item['media_url']) ? $item['media_url'] : ''; ?>

                    <?php if ($counter % $photos_count == 0) : ?>

                    <!--
                        Start a new wrapping div for every 5 photos on mobile -->

                    <div class="gallery__row-bottom__inner swiper-slide">

                        <?php endif; ?>

                        <div class="gallery__row-bottom__card">

                            <img src="<?= $photo ?>" alt="Instagram Photo">

                        </div>

                        <?php if ($counter % $photos_count == ($photos_count - 1) || $counter == count($data['data']) - 1) : ?>

                        <!-- Close the wrapping div after every 5 photos or at the end of the loop on mobile -->

                    </div>

                    <?php endif; ?>

                    <?php $counter++; ?>

                    <?php endif; ?>

                    <?php endforeach; ?>

                </div>

            </div>

            <?php else :

            echo 'No posts found';

            endif; ?>

        </div>

        <div class="swiper__gallery__button-prev"></div>

        <div class="swiper__gallery__button-next"></div>

    </div>

</section>