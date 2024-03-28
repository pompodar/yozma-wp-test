<?php
    $image = (get_post_thumbnail_id() ? fly_get_attachment_image_src(get_post_thumbnail_id(), [460,300], true)['src'] : get_asset_uri('images/placeholder.png'));
    $alt = (get_post_thumbnail_id() ? get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) : '');
?>

<article class="post-card h-100 d-flex flex-column" style="border:1px solid black;">
    <div class="post-card-image">
        <img data-src="<?php echo $image;?>" src="<?php asset_uri('images/placeholder.png');?>" alt="<?php echo $alt;?>" class="img-fluid w-100 lozad" width="460" height="300">
    </div>
    <div class="post-card-details py-1_25 px-1_5 flex-grow-1">
        <span class="date colour-blue overline mb-0_5"><?=get_the_date( 'jS F, Y')?></span>
        <h1 class="h4 mb-1 mt-0_5"><?php the_title();?></h1>
        <?php if(has_excerpt()) echo '<p class="mb-1">' . wp_trim_words(get_the_excerpt(), 24, '...') . '</p>';?>

        <?php if(get_the_author() ) { ?>
            <span class="body-small-size d-block my-1">By <?php the_author();?></span>
        <?php } ?>

        <a href="<?php the_permalink();?>" class="stretched-link no-style-link strong mt-1" title="<?php the_title();?>">Read more</a>
    </div>
</article>
