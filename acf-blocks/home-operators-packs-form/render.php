<?php
    $id = get_field('id');

	$heading = get_field('heading');
    
	$paragraph_one = get_field('paragraph_one');
    $paragraph_two = get_field('paragraph_two');

    $gdpr_text = get_field('gdpr_text');
?>

<section id="<?= $id ?>" data-aos="fade-up" class='packs-form'>

    <div class="container">

        <div class="packs-form__inner">

            <div class="packs-form__row-top">

                <h2 class="packs-form__heading">

                    <?= $heading ?>

                </h2>

                <div class="packs-form__paragraphs">

                    <div class="packs-form__paragraph">

                        <?= $paragraph_one ?>

                    </div>

                    <div class="packs-form__paragraph">

                        <?= $paragraph_two ?>

                    </div>

                </div>

            </div>

            <div class="packs-form__row-bottom">

                <div class="packs__form__wrapper">

                    <form id="packs__form" class="packs__form" action="#" method="post">

                        <fieldset class="packs__form__fieldset">

                            <div class="packs__form__fieldset__item">

                                <label for="first_name">First Name*</label>
                                <input type="text" name="first_name" id="first_name" required>

                            </div>

                            <div class="packs__form__fieldset__item">

                                <label for="last_name">Last Name*</label>
                                <input type="text" name="last_name" id="last_name" required>

                            </div>

                            <div class="packs__form__fieldset__item">

                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" required>

                            </div>

                            <div class="packs__form__fieldset__item">

                                <label for="address">Address*</label>
                                <input type="text" name="address" id="address" required>

                            </div>

                            <div class="packs__form__fieldset__item">

                                <label for="town_or_city">Town or City*</label>
                                <input type="text" name="town_or_city" id="town_or_city">

                            </div>

                            <div class="packs__form__fieldset__item">

                                <label for="county">County*</label>
                                <input type="text" name="county" id="county">

                            </div>

                            <div class="packs__form__fieldset__item">

                                <label for="pub_name">Pub Name*</label>
                                <input type="text" name="pub_name" id="pub_name">

                            </div>

                            <div class="packs__form__fieldset__item">

                                <label for="post_code">Postcode*</label>
                                <input type="text" name="post_code" id="post_code">

                            </div>

                            <div class="packs__form__fieldset__item">

                                <label for="post_code">Number of packs*</label>
                                <input type="number" name="number_of_packs" id="number_of_packs">

                            </div>

                            <label class="packs__form__fieldset__item gdpr-text__label" for="gdpr-text">

                                <span>

                                    <?= $gdpr_text ?>

                                </span>

                            </label>

                        </fieldset>

                        <button type="submit" class="packs-form__send-button__inner button">Send Request</button>

                        <div class="loader"></div>

                        <div class="success-message" style="display: none;"></div>

                        <div class="error-message" style="display: none;"></div>

                    </form>

                </div>

            </div>

        </div>

</section>

<script src="https://www.google.com/recaptcha/api.js?render=6LfxApIpAAAAAFz-qyorl35V_WZ875Z5Kvae0-QC"></script>