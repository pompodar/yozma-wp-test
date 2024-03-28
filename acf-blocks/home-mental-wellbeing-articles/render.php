<?php
    $id = get_field('id');

    $items_repeater = get_field('items_repeater');

?>

<div class="lightbox-overlay-articles">
    <div class="lightbox-content">
        <span class="close-lightbox">&times;</span>
        <iframe src="" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; web-share"
            allowfullscreen></iframe>
    </div>
</div>

<section id="<?= $id ?>" data-aos="fade-up" class='articles'>

    <div class="container">

        <div class="articles__inner">

            <?php if ($items_repeater) : ?>

            <?php foreach($items_repeater as $item):
                        $heading = $item['heading'];
                        $paragraph = $item['paragraph'];
                        
                        $video = $item['video'];
                        $video_background = !empty($item['video_background']['url']) ? $item['video_background']['url'] : '';
                        
                        $button_one_text = $item['button_one_text'];
                        $button_one_link = !empty($item['button_one_link']['url']) ? $item['button_one_link']['url'] : '';

                        $button_two_text = $item['button_two_text'];
                        $button_two_link = !empty($item['button_two_link']['url']) ? $item['button_two_link']['url'] : '';
			        ?>

            <div class="article">

                <div class="article__left">

                    <h2 class="article__heading">

                        <?= $heading ?>

                    </h2>

                    <div class="article__paragraph">

                        <?= $paragraph ?>

                    </div>

                    <?php if (!empty($button_one_text) || !empty($button_two_text)) : ?>

                    <div
                        class="article__buttons <?php echo (!empty($button_one_text) && !empty($button_two_text)) ? 'both_buttons' : 'single_or_none_buttons'; ?>">

                        <?php if (!empty($button_one_text)) : ?>

                        <a target="_blank" class="article__buttons__button" href="<?= $button_one_link ?>">

                            <?= $button_one_text ?>
                        </a>

                        <?php endif; ?>

                        <?php if (!empty($button_two_text)) : ?>

                        <a target="_blank" class="article__buttons__button" href="<?= $button_two_link ?>">

                            <?= $button_two_text ?>

                        </a>

                        <?php endif; ?>

                    </div>

                    <?php endif; ?>

                </div>

                <div class="article__right">

                    <div class=" article-video__video__background">

                        <img src="<?= $video_background ?>" alt="Article">

                    </div>

                    <?php if (!empty($video)) : ?>

                    <div class="article-video-play"> </div>

                    <?php endif; ?>

                    <iframe src=" <?= $video ?>" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; web-share"
                        allowfullscreen></iframe>

                </div>

            </div>

            <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>

</section>