<?php
	$id = get_field('id');
	
    $heading = get_field('heading');
    $paragraph = get_field('paragraph');		

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(
        'post_type'      => 'post', 
        'posts_per_page' => -1,
        'paged'          => $paged,      
    );

    $latest_posts = new WP_Query( $args );

?>

<section id="<?= $id ?>" class='blog'>

    <div class="container">

        <div class="blog__inner">

            <div class="blog__row-top">

                <h1 class="blog__heading">

                    <?= $heading ?>

                </h1>

                <div class="blog__paragraph">

                    <?= $paragraph ?>

                </div>

            </div>

            <?php if ( $latest_posts->have_posts() ) : ?>


            <div class="blog__row-bottom">

                <?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post();

                    ?>

                <a href="<?php the_permalink(); ?>" class="blog__row-bottom__card">

                    <div class="blog__row-bottom__card__background">

                        <?php if ( has_post_thumbnail() ) :

                        the_post_thumbnail('medium');

                        endif;

                        ?>

                    </div>

                    <h2 class="blog__row-bottom__card__heading">
                        <?php the_title(); ?>
                    </h2>

                    <div class="blog__row-bottom__card__paragraph">

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

                    <p class="blog__row-bottom__card__button">

                        Read more

                    </p>

                </a>

                <?php
            
            endwhile;
        
            wp_reset_postdata(); ?>

            </div>

            <?php else :

            echo 'No posts found';

            endif;

            ?>

        </div>

    </div>

    <div class="blog__pagination">
        <?php
                echo paginate_links( array(
                    'total'   => $latest_posts->max_num_pages,
                    'current' => max( 1, get_query_var( 'paged' ) ),
                    'prev_text'  => '', 
                    'next_text'  => '',

                ) );
            ?>

    </div>

</section>