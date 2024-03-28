<?php
$id = get_field('id');
$posts_count = get_field('posts_count');
$heading = get_field('heading');

// Get selected tags from ACF
$selected_tags = get_field('tags');

$args = array(
    'post_type'      => 'post',
    'posts_per_page' => $posts_count,
    'tag__in'       => $selected_tags, 
);

$latest_posts = new WP_Query($args);
?>

<section id="<?= $id ?>" data-aos="fade-up" class='news'>
    <div class="container">
        <div class="news__inner">
            <div class="news__row-top">
                <h2 class="news__heading">
                    <?= $heading ?>
                </h2>
            </div>

            <?php if ($latest_posts->have_posts()) : ?>
            <div class="swiper__home-news">
                <div class="news__row-bottom swiper-wrapper">

                    <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>

                    <a href="<?php the_permalink(); ?>" class="news__row-bottom__card swiper-slide">
                        <div class="news__row-bottom__card__background">
                            <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                            <?php endif; ?>
                        </div>
                        <h3 class="news__row-bottom__card__heading">
                            <?php the_title(); ?>
                        </h3>
                        <div class="news__row-bottom__card__paragraph">

                            <?php
                                $excerpt = get_the_excerpt();
                                    
                                    // Check if the excerpt is longer than 30 words
                                    if (str_word_count($excerpt) > 30) {
                                        // Trim the excerpt to 30 words
                                        $excerpt = wp_trim_words($excerpt, 30);
                                        // Add ellipses
                                    }
                                    
                                    // Output the modified excerpt
                                    echo $excerpt;
                                ?>
                        </div>
                        <p class="news__row-bottom__card__button">
                            Read more
                        </p>
                    </a>

                    <?php endwhile;

                        wp_reset_postdata(); ?>

                </div>

                <div class="swiper__home-news__button-prev"></div>
                <div class="swiper__home-news__button-next"></div>
            </div>

            <?php else :
                echo 'No posts found';
            endif;
            ?>

        </div>
    </div>
</section>