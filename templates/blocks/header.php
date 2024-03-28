<!-- <header id="header" class="header">

    <?php

    $banner_enabled = get_field('banner_enabled', 'option');
    
    if ( $banner_enabled === 'yes' ) : ?>

    <div id="banner" class="banner">

        <p class="banner__text">

            <?php the_field('banner_text', 'option'); ?>

        </p>

        <a href="<?php the_field('banner_button_one_link', 'option')['url']; ?>" class="banner__button">

            <?php the_field('banner_button_one_text', 'option'); ?>

        </a>

        <a href="<?php the_field('banner_button_two_link', 'option')['url']; ?>" class="banner__button">

            <?php the_field('banner_button_two_text', 'option'); ?>

        </a>


    </div>

    <?php endif; ?>

    <div class="container">

        <div class="header__desktop">

            <div class="header__inner">

                <div class='header__left'>

                    <div class="header__logo">
                        <?php the_custom_logo(); ?>
                    </div>

                    <div class="header__nav">

                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'ltc_header_menu', 
                                'container' => 'nav',               
                                'container_class' => 'header-menu', 
                                'walker' => new LTC_Walker_Nav_Menu(),
                            ));
                        ?>

                    </div>
                </div>

                <div class='header__right'>

                    <a href="/contact/" class="header_cta-button button">
                        Contact us
                    </a>

                    <a href="tel:<?php the_field('phone_number', 'option'); ?>" class="header__phone-info">

                        <p class="header__phone-info__inner">
                            <span>Call us 24/7 on</span>
                            <span class="phone-number"><?php the_field('phone_number', 'option'); ?></span>
                        </p>

                    </a>

                </div>
            </div>
        </div>

        <div class="header__mobile">
            <div class="header__mobile__top">

                <a href="/" class="header__mobile__logo">
                    <img src="<?php echo get_field('mobile_logo', 'option')['url']; ?>" alt="logo">
                </a>

                <div class="header__mobile__contacts">

                    <a href="tel:<?php the_field('phone_number', 'option'); ?>" class="header__mobile__phone">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/call.svg'; ?>" alt="call">
                    </a>

                    <a href="mailto:example@example.com?subject=Feedback" class="header__mobile__mail">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/email.svg'; ?>" alt="email">
                    </a>

                </div>

                <div class="header__mobile__hamburger">

                    <img class="hamburger-open"
                        src="<?php echo get_template_directory_uri() . '/assets/images/hamburger-open.svg'; ?>"
                        alt="hamburger">

                    <img class="hamburger-closed"
                        src="<?php echo get_template_directory_uri() . '/assets/images/hamburger-closed.svg'; ?>"
                        alt="hamburger">

                </div>

            </div>

            <div class="header__mobile__bottom">

                <div class="header__mobile__nav">

                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'ltc_header_menu', 
                            'container' => 'nav',               
                            'container_class' => 'header-menu', 
                            'walker' => new LTC_Walker_Nav_Menu(),
                        ));
                    ?>

                    <div class="header__mobile__social-links">

                        <a href="#" class="twitter">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/twitter.svg'; ?>"
                                alt="Twitter">
                        </a>

                        <a href="#" class="instagram">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/instagram.svg'; ?>"
                                alt="Instagram">
                        </a>


                        <a href="#" class="facebook">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/facebook.svg'; ?>"
                                alt="Facebook">
                        </a>

                        <a href="" class="linkedin">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/linkedin.svg'; ?>"
                                alt="Linkedin">
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header> -->