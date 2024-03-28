<!-- <footer class="footer">

    <div class="footer__background">

        <div class="container">

            <div class="footer__inner">

                <div class="footer__top">

                    <div class="footer__top__left">

                        <a href="/" class="footer-logo">
                            <img src="<?php echo get_field('footer_logo', 'option')['url']; ?>" alt="logo">
                        </a>

                        <div class="footer__social-links">

                            <h3 class="footer__social-links__heading">
                                Follow us
                            </h3>

                            <div class="social-links">

                                <a href="<?php echo get_field('twitter_link', 'option')['url']; ?>" class="twitter">

                                </a>

                                <a href="<?php echo get_field('instagram_link', 'option')['url']; ?>" class="instagram">

                                </a>


                                <a href="<?php echo get_field('facebook_link', 'option')['url']; ?>" class="facebook">

                                </a>

                                <a href="<?php echo get_field('linkedin_link', 'option')['url']; ?>" class="linkedin">

                                </a>

                            </div>
                        </div>

                    </div>

                    <div class="footer__top__right">

                        <div class="footer__nav">

                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'ltc_footer_menu_left', 
                                'container' => 'nav',               
                                'container_class' => 'header-menu', 
                            ));

                            wp_nav_menu(array(
                                'theme_location' => 'ltc_footer_menu_right', 
                                'container' => 'nav',               
                                'container_class' => 'header-menu', 
                            ));
                        ?>

                        </div>

                        <div class="footer__company-info">

                            <a href="tel:<?php echo get_field('phone_number', 'option'); ?>" class="footer__phone-info">

                                <p class="footer__phone-info__inner">
                                    <span>Call us 24/7 on</span>
                                    <span class="phone-number"><?php echo get_field('phone_number', 'option'); ?></span>
                                </p>

                            </a>

                            <a class="footer__email-info"
                                href="mailto:<?php echo get_field('email', 'option'); ?>?subject=Feedback">
                                <?php echo get_field('email', 'option'); ?>
                            </a>

                            <a target="_blank" class="footer__location-info"
                                href="https://maps.app.goo.gl/wa6muoH3TD2jHuPW9">

                                <address>

                                    <p>
                                        <span
                                            class="address__top"><?php echo get_field('address_top', 'option'); ?></span>
                                        <br>
                                        <span class="address__bottom">
                                            <?php echo get_field('address_bottom', 'option'); ?></span>
                                    </p>

                                </address>
                            </a>

                        </div>

                    </div>

                </div>

                <div class="footer__bottom">

                    <div class="footer__bottom__copywright">

                        <p>
                            <?php
                                $currentYear = date('Y');
                            ?>

                            © <?= $currentYear ?> Licensed Trade Charity. All rights reserved. </p>

                    </div>

                    <div class="footer__bottom__policy">

                        <a href="<?php echo get_field('privacy_policy', 'option')['url']; ?>"
                            class="footer__bottom__policy__cookie">
                            Privacy Policy
                        </a>

                        <a href="<?php echo get_field('cookie_policy', 'option')['url']; ?>"
                            class="footer__bottom__policy__privacy">
                            Cookie Policy
                        </a>

                        <?php if ( isset(get_field('code_of_conduct_policy', 'option')['url'] )) : ?>

                        <a href="<?php echo get_field('code_of_conduct_policy', 'option')['url']; ?>"
                            class="footer__bottom__policy__privacy">
                            Code of Conduct Policy
                        </a>

                        <?php endif; ?>

                    </div>

                    <div class="footer__bottom__designed-by">

                        <a target="_blank" href="https://www.londonwebdesignagency.com/">

                            Website by LWDA

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</footer> -->
