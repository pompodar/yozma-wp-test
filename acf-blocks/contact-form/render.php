<?php
    $id = get_field('id');

	$heading = get_field('heading');
    
	$paragraph_one = get_field('paragraph_one');
    $current_most_recent_employer_text = get_field('current_most_recent_employer_text');

    $gdpr_text = get_field('gdpr_text');
?>

<section id="<?= $id ?>" data-aos="fade-up" class='contact-form'>

    <div class="container">

        <div class="contact-form__inner">

            <div class="contact-form__row-top">

                <h2 class="contact-form__heading">

                    <?= $heading ?>

                </h2>

                <div class="contact-form__paragraphs">

                    <div class="contact-form__paragraph">

                        <?= $paragraph_one ?>

                    </div>

                </div>

            </div>

            <div class="contact-form__row-bottom">


                <div class="contact__form__wrapper">

                    <form id="contact__form" class="contact__form" action="" method="post">

                        <fieldset class="contact__form__fieldset">

                            <div class="contact__form__left">

                                <div class="contact__form__fieldset__item contact__form__fieldset__item__category">

                                    <label for="category">Category</label>

                                    <select name="category" id="category">

                                        <option class=" category_placeholder" value="" disabled selected>Select a
                                            category</option>

                                        <option value="1">Mental Health</option>
                                        <option value="2">Housing</option>
                                        <option value="3">Health</option>
                                        <option value="4">Money</option>
                                        <option value="8">Employment</option>
                                        <option value="5">Education &amp; Training</option>
                                        <option value="7">Your existing emergency support fund application</option>
                                        <option value="6">Other</option>

                                    </select>

                                </div>

                                <div class="contact__form__fieldset__item" id="otherlabelrow">
                                    <label for="otherlabel">What is the question
                                        about?</label>
                                    <input id="otherlabel" name="otherlabel" type="text"
                                        placeholder="What is the question about?" class="form-control input-md">
                                </div>

                                <div class="contact__form__fieldset__item">

                                    <label for="first_name">First Name*</label>
                                    <input type="text" name="first_name" id="first_name" placeholder="First name"
                                        required>

                                </div>

                                <div class="contact__form__fieldset__item">

                                    <label for="last_name">Last Name*</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="Last name" required>

                                </div>

                                <div class="contact__form__fieldset__item">

                                    <label for="email">Email*</label>
                                    <input type="email" name="email" id="email" placeholder="Email" required>

                                </div>

                                <div class="contact__form__fieldset__item contact__form__fieldset__item__phone">

                                    <label for="email">Phone*</label>
                                    <input type="tel" name="phone" id="phone" placeholder="Phone" required>

                                </div>

                            </div>

                            <div class="contact__form__right">

                                <div
                                    class="contact__form__fieldset__item contact__form__fieldset__item-current_most_recent_employer">

                                    <label for="current_most_recent_employer">Current most recent employer*</label>

                                    <input type="text" name="current_most_recent_employer" oninput="filterNames()"
                                        id="current_most_recent_employer" placeholder="Current most recent employer"
                                        required>

                                    <div id="nameSuggestions"></div>


                                    <div class="current-most-recent-employer-text">
                                        <?= $current_most_recent_employer_text ?> </div>

                                </div>

                                <div class="contact__form__fieldset__item contact__form__fieldset__item-subject">

                                    <label for="address">Subject*</label>
                                    <input type="text" name="subject" id="subject" placeholder="Subject" required>

                                </div>

                                <div class="contact__form__fieldset__item contact__form__fieldset__item-enquiry">

                                    <label for="address">Enquiry*</label>
                                    <textarea name="enquiry" id="enquiry" placeholder="Enquiry" required></textarea>

                                </div>

                                <div class="contact__form__fieldset__item contact__form__fieldset__item-timelabe">
                                    <!-- Text input-->
                                    <label class="col-md-4 control-label" for="timelabe">Length of employment in the
                                        licensed drinks industry*</label>
                                    <!--            <input id="timelabe" name="timelabe" placeholder="Length of employment in the licensed drinks industry*" class="form-control input-md">-->
                                    <select id="timelabe" name="timelabe" class="form-control" required>
                                        <option selected="selected" disabled="disabled" value="">Length of employment in
                                            the licensed drinks industry*</option>
                                        <?php
                                            for ($i = 1; $i < 100; $i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                            ?>
                                    </select>
                                    <p id="demo"></p>
                                </div>

                            </div>

                        </fieldset>

                        <label class="contact__form__fieldset__item gdpr-text__label" id="gdpr-text__label"
                            for="gdpr-text">

                            <span class="gdpr-text">

                                <?= $gdpr_text ?>

                            </span>

                        </label>

                        <button type=" submit" class="contact-form__send-button__inner button" id="submitButton">Send
                            Request</button>

                        <div class="loader"></div>

                        <div class="success-message" style="display: none;"></div>

                        <div class="error-message" style="display: none;"></div>

                    </form>

                </div>

            </div>

        </div>

</section>

<script src="https://www.google.com/recaptcha/api.js?render=6LfxApIpAAAAAFz-qyorl35V_WZ875Z5Kvae0-QC"></script>

<script src="/wp-content/themes/LTC/assets/scripts/pub-names.js"></script>

<script>
function filterNames() {
    const input = jQuery('.contact-form #current_most_recent_employer').val().toLowerCase();
    const suggestions = [];
    const exactMatches = [];
    const partialMatches = [];

    for (let i = 0; i < data.length; i++) {
        const name = data[i].Name.toLowerCase();

        const suggestion = data[i].Name;

        if (name.startsWith(input)) {
            exactMatches.push(suggestion);
        } else if (name.includes(input)) {
            partialMatches.push(suggestion);
        }
    }

    // Sort exact matches alphabetically
    exactMatches.sort();

    // Sort partial matches alphabetically
    partialMatches.sort();

    // Combine exact and partial matches
    suggestions.push(...exactMatches, ...partialMatches);

    if (suggestions.length > 0) {
        displaySuggestions(suggestions);
    }
}

function displaySuggestions(suggestions) {
    const suggestionList = jQuery('.contact-form #nameSuggestions');
    suggestionList.empty();

    if (suggestions.length > 0) {
        for (var i = 0; i < suggestions.length; i++) {
            suggestionList.append('<div class="suggestion" data-value="' + suggestions[i] + '">' + suggestions[i] +
                '</div>');
        }

        suggestionList.css('display', 'flex');

        jQuery('#nameSuggestions').on('click', '.suggestion', function() {
            const selectedValue = jQuery(this).data('value');

            jQuery('.contact-form #current_most_recent_employer').val(selectedValue);
            jQuery('.contact-form #nameSuggestions').empty();

            suggestionList.css('display', 'none');
        });


    } else {
        // suggestionList.append('<div>No suggestions</div>');
    }
}
</script>