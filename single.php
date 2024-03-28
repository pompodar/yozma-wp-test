<?php while (have_posts()) : the_post();

    $image = get_the_post_thumbnail_url(null, 'large');

    $heading = get_the_title();
    
    $paragraph_one = get_the_excerpt();

    
?>

<section class='article-header'>

    <div class="container">

        <div class="article-header__inner">

            <div class="article-header__row-left">

                <div class="article-header__row-left__background-color">

                </div>

                <div class="article-header__row-left__background-image">

                    <img src="<?= $image ?>" alt="LTC hero image">

                </div>

            </div>

            <div class="article-header__row-right">

                <h1 class="article-header__heading">

                    <?= $heading ?>

                </h1>

                <p class="article-header__paragraph article-header__paragraph">

                    <?= $paragraph_one ?>

                </p>

            </div>

        </div>

    </div>

</section>

<?php
    
    the_content();

    ?>

<?php
	
    $card_one_heading = 'Get Help';	
    $card_one_paragraph = 'Our Mission is “to equip people to be self-reliant and achieve their personal best”';
    $card_one_button_text = 'Find our more';	
    $card_one_button_link = '/get-help';	

    $card_two_heading = 'Operators';	
    $card_two_paragraph = "Our free support packages can help you and your teams.";	
    $card_two_button_text = 'Find our more';	
    $card_two_button_link = '/resource-hub';	

    $card_three_heading = "Donate & Support us";	
    $card_three_paragraph = "We’re always grateful for your donations and willingness to volunteer.";
    $card_three_button_text = 'Find our more';	
    $card_three_button_link = '/donate';	

?>

<section data-aos="fade-up" class='cards'>

    <div class="container">

        <div class="cards__inner">

            <div class="cards__card">

                <div class="cards__left">

                    <h2 class="cards__card__heading">

                        <?= $card_one_heading ?>

                    </h2>

                    <br>

                    <p class="cards__card__paragraph">

                        <?= $card_one_paragraph ?>

                    </p>

                    <a href="<?= $card_one_button_link ?>" class="cards__card__button">

                        <?= $card_one_button_text ?>

                    </a>

                </div>

                <div class="cards__right cards__right-one">

                    <!-- <img src="<?= $card_one_image ?>" alt="Get Help"> -->

                </div>

            </div>

            <div class="cards__card">

                <div class="cards__left">

                    <h2 class="cards__card__heading">

                        <?= $card_two_heading ?>

                    </h2>

                    <br>

                    <p class=" cards__card__paragraph">

                        <?= $card_two_paragraph ?>

                    </p>

                    <a href="<?= $card_two_button_link ?>" class="cards__card__button">

                        <?= $card_two_button_text ?>

                    </a>

                </div>

                <div class="cards__right cards__right-two">

                    <!-- <img src="<?= $card_two_image ?>" alt="Operators"> -->

                </div>

            </div>

            <div class="cards__card">

                <div class="cards__left">

                    <h2 class="cards__card__heading">

                        <?= $card_three_heading ?>

                    </h2>

                    <br>

                    <p class="cards__card__paragraph">

                        <?= $card_three_paragraph ?>

                    </p>

                    <a href="<?= $card_three_button_link ?>" class="cards__card__button">

                        <?= $card_three_button_text ?>

                    </a>

                </div>

                <div class="cards__right cards__right-three">

                    <!-- <img src="<?= $card_three_image ?>" alt="Donate and Support Us"> -->

                </div>

            </div>

        </div>

    </div>

</section>

<?php
    $posts_count = -1;
	
    $heading = 'Latest News';	

    $args = array(
        'post_type'      => 'post', 
        'posts_per_page' => $posts_count,      
    );

    $latest_posts = new WP_Query( $args );

?>

<section data-aos="fade-up" class='news'>

    <div class="container">

        <div class="news__inner">

            <div class="news__row-top">

                <h1 class="news__heading">

                    <?= $heading ?>

                </h1>

            </div>

            <?php if ( $latest_posts->have_posts() ) : ?>

            <div class="swiper__home-news">

                <div class="news__row-bottom swiper-wrapper">

                    <?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post();

                    ?>

                    <a href="<?php the_permalink(); ?>" class="news__row-bottom__card swiper-slide">
                        <div class="news__row-bottom__card__background">
                            <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                            <?php endif; ?>
                        </div>
                        <h2 class="news__row-bottom__card__heading">
                            <?php the_title(); ?>
                        </h2>
                        <div class="news__row-bottom__card__paragraph">

                            <?php
                            $excerpt = get_the_excerpt();
                                
                                // Check if the excerpt is longer than 30 words
                                if (str_word_count($excerpt) > 30) {
                                    // Trim the excerpt to 30 words
                                    $excerpt = wp_trim_words($excerpt, 30);
                                }
                                
                                // Output the modified excerpt
                                echo $excerpt;
                            ?>

                        </div>
                        <p class="news__row-bottom__card__button">
                            Read more
                        </p>
                    </a>

                    <?php
            
            endwhile;
        
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

<?php

    $heading = 'Remember, you can always reach out to us via our helpline, 
24 hours a day, 7 days a week. Just call us on 0808 801 0550 and we’ll do out best to assist you.';
 
$background = !empty(get_field('reach_out_background', 'option')['url']) ? get_field('reach_out_background', 'option')['url'] : '';

?>

<section data-aos="fade-up" class='reach-out'>

    <div class="reach-out__background">
        <img src="<?= $background ?>" alt="reach out">
    </div>

    <div class="container">

        <div class="reach-out__inner">

            <h2 class="reach-out__heading"><?= $heading ?></h2>

        </div>

    </div>

</section>

<?php

endwhile;