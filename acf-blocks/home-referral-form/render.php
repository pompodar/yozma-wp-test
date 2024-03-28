<?php
    $id = get_field('id');

	$heading = get_field('heading');
    
    $current_most_recent_employer_text = get_field('current_most_recent_employer_text');

    $gdpr_text = get_field('gdpr_text');
?>

<section id="<?= $id ?>" data-aos="fade-up" class='referral-form'>

    <div class="container">

        <div class="referral-form__inner">

            <div class="referral-form__row-top">

                <h2 class="referral-form__heading">

                    <?= $heading ?>

                </h2>

            </div>

            <div class="referral-form__row-bottom">

                <div class="referral__form__wrapper">

                    <form id="referral__form" class="referral__form" action="" method="post">

                        <fieldset class="referral__form__fieldset">

                            <div class="referral__form__left">

                                <div class="referral__form__fieldset__item">

                                    <label for="first_name">First Name*</label>
                                    <input type="text" name="first_name" id="first_name" placeholder="First name"
                                        required>

                                </div>

                                <div class="referral__form__fieldset__item">

                                    <label for="last_name">Last Name*</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="Last name" required>

                                </div>

                                <div class="referral__form__fieldset__item">

                                    <label for="post_code">Postcode*</label>
                                    <input type="text" name="post_code" id="post_code" placeholder="Postcode" required>

                                </div>

                                <div class="referral__form__fieldset__item">

                                    <label for="address_first_line">Address First Line</label>

                                    <input type="text" name="address_first_line" id="address_first_line"
                                        placeholder="Address First Line">

                                </div>

                                <div class="referral__form__fieldset__item">

                                    <label for="address_second_line">Address Second Line</label>

                                    <input type="text" name="address_second_line" id="address_second_line"
                                        placeholder="Address Second Line">

                                </div>

                                <div class="referral__form__fieldset__item">

                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" placeholder="City">

                                </div>

                                <div class="referral__form__fieldset__item">

                                    <label for="county">County</label>

                                    <input type="text" name="county" id="county" placeholder="County">

                                </div>

                                <div
                                    class="referral__form__fieldset__item referral__form__fieldset__item__select referral__form__fieldset__item__select">

                                    <label for="gender">Gender*</label>

                                    <select name="gender" id="gender" required>

                                        <option value="" disabled selected>Select a gender</option>

                                        <option value="Female">Female</option>

                                        <option value="Male">Male</option>

                                        <option value="Other">Other</option>

                                        <option value="Trans">Trans</option>

                                    </select>

                                </div>

                                <div class="referral__form__fieldset__item">

                                    <label for="email">Email*</label>
                                    <input type="email" name="email" id="email" placeholder="Email" required>

                                </div>

                                <div class="referral__form__fieldset__item referral__form__fieldset__item__phone">

                                    <label for="phone">Phone*</label>
                                    <input type="tel" name="phone" id="phone" placeholder="Phone" required>

                                </div>

                                <div
                                    class="referral__form__fieldset__item referral__form__fieldset__item-date_of_birth">

                                    <p>Date of Birth*</p>

                                    <div class="referral__form__fieldset__item__date_of_birth">

                                        <div class="referral__form__fieldset__item__select">
                                            <label for=" day">Day:</label>
                                            <select id="day" name="day" required>

                                                <option value="" disabled selected>Select a day</option>

                                                <?php
                                            for ($i = 1; $i <= 31; $i++) {
                                                echo "<option value=\"$i\">$i</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>

                                        <div class="referral__form__fieldset__item__select">
                                            <label for="month">Month:</label>
                                            <select id="month" name="month" required>

                                                <option value="" disabled selected>Select a month</option>

                                                <?php
                                            $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                            foreach ($months as $index => $month) {
                                                $monthNumber = $index + 1;
                                                echo "<option value=\"$monthNumber\">$month</option>";
                                            }
                                            ?>
                                            </select>
                                        </div>

                                        <div class="referral__form__fieldset__item__select">
                                            <label for="year">Year:</label>

                                            <select id="year" name="year" required>

                                                <option value="" disabled selected>Select a year</option>

                                                <?php
                                            $currentYear = date("Y");
                                            $startYear = $currentYear - 100;
                                            for ($i = $currentYear - 18; $i >= $startYear; $i--) {
                                                echo "<option value=\"$i\">$i</option>";
                                            }
                                            ?>
                                            </select>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="referral__form__right">

                                <div
                                    class="referral__form__fieldset__item referral__form__fieldset__item__category referral__form__fieldset__item__select">

                                    <label for="category">Category*</label>

                                    <select name="category" id="category" required>

                                        <option value="" disabled selected>Select a category</option>

                                        <option value="Mental Health">Mental Health</option>

                                        <option value="Housing">Housing</option>

                                        <option value="Health">Health</option>

                                        <option value="Money">Money</option>

                                        <option value="Education and Training">Education and Training</option>

                                    </select>

                                </div>

                                <div
                                    class="referral__form__fieldset__item referral__form__fieldset__item__housing-status referral__form__fieldset__item__select">

                                    <label for="housing_status">Housing Status*</label>

                                    <select name="housing_status" id="housing_status" required>

                                        <option value="" disabled selected>Select a housing status</option>

                                        <option value="Houseless">Houseless</option>

                                        <option value="Hostel">Hostel</option>

                                        <option value="Housing Association">Housing Association</option>

                                        <option value="Living with Relatives">Living with Relatives</option>

                                        <option value="Local Auth. Perm.">Local Auth. Perm.</option>

                                        <option value="Local Auth. Temp.">Local Auth. Temp.</option>

                                        <option value="Owner Occupier">Owner Occupier</option>

                                        <option value="Private Rented">Private Rented</option>

                                        <option value="Residential Care">Residential Care</option>

                                        <option value="Residential Park Home">Residential Park Home</option>

                                        <option value="Shared Ownership">Shared Ownership</option>

                                        <option value="Shared Ownership Adapted">Shared Ownership Adapted</option>

                                        <option value="Sheltered Accommodation">Sheltered Accommodation</option>

                                        <option value="Tied Accommodation">Tied Accommodation</option>

                                    </select>

                                </div>

                                <div
                                    class="referral__form__fieldset__item referral__form__fieldset__item__family-status referral__form__fieldset__item__select">

                                    <label for="family_status">Family Status*</label>

                                    <select name="family_status" id="family_status" required>

                                        <option value="" disabled selected>Select a family status</option>

                                        <option value="Couple">Couple</option>

                                        <option value="Divorced">Divorced</option>

                                        <option value="Family">Family</option>

                                        <option value="Separated">Separated</option>

                                        <option value="Single">Single</option>

                                        <option value="Widowed">Widowed</option>

                                    </select>

                                </div>

                                <div
                                    class="referral__form__fieldset__item referral__form__fieldset__item__employment-status referral__form__fieldset__item__select">

                                    <label for="employment_status">Employment Status*</label>

                                    <select name="employment_status" id="employment_status" required>

                                        <option value="" disabled selected>Select a category</option>

                                        <option value="Not Working">Not Working</option>

                                        <option value="Not Working Carer">Not Working Carer</option>

                                        <option value="Not Working Long Term">Not Working Long Term</option>

                                        <option value="Not Working Short Term">Not Working Short Term</option>

                                        <option value="Retired">Retired</option>

                                        <option value="Self Employed">Self Employed</option>

                                        <option value="Student">Student</option>

                                        <option value="Unemployed Seeking">Unemployed Seeking</option>

                                        <option value="Working">Working</option>

                                    </select>

                                </div>

                                <div
                                    class="referral__form__fieldset__item referral__form__fieldset__item__date-of-birth referral__form__fieldset__item__select">

                                    <label for="day">Number of Years in Trade</label>

                                    <select id="number_of_years_in_trade" name="number_of_years_in_trade">

                                        <option value="" disabled selected>Select a number of year in trade</option>

                                        <option value="0">Less then One Year</option>

                                        <?php
                                            for ($i = 1; $i <= 50; $i++) {
                                                echo "<option value=\"$i\">$i</option>";
                                            }
                                            ?>
                                    </select>

                                </div>

                                <div
                                    class="referral__form__fieldset__item referral__form__fieldset__item-current_most_recent_employer">

                                    <label for="current_most_recent_employer">Current most recent employer*</label>

                                    <input type="text" name="current_most_recent_employer" oninput="filterNames()"
                                        id="current_most_recent_employer" placeholder="Current most recent employer"
                                        required>

                                    <div id="nameSuggestions"></div>

                                    <div class="current-most-recent-employer-text">
                                        <?= $current_most_recent_employer_text ?> </div>

                                    <div id="greenkingemployerWarning" class="noyeartrade-ineligible ineligible"
                                        style="display:none; color:#E44746;">

                                        Sorry, you are not eligible for financial support.

                                    </div>

                                </div>

                                <div class="referral__form__fieldset__item referral__form__fieldset__item__select"
                                    style="display:none;">

                                    <label for="yearsingreenking">Years in Greene King*</label>

                                    <select name="yearsingreenking" id="yearsingreenking" class="eligibility-check">
                                        <option value="">
                                            Have you worked for Greene King for more than 6 months?
                                        </option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <div id="yearsingreenkingWarning" class="noyeartrade-ineligible ineligible">
                                        Sorry, you are not eligible for financial support.
                                    </div>
                                </div>

                                <div class="referral__form__fieldset__item referral__form__fieldset__item__select"
                                    style="display:none;">

                                    <label for="greenkingsavings">Savings*</label>

                                    <select name="greenkingsavings" id="greenkingsavings" class="eligibility-check">
                                        <option value="">
                                            Have you got any savings?
                                        </option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <div id="greenkingsavingsWarning" class="noyeartrade-ineligible ineligible"
                                        style="display:none; color:#E44746;">
                                        Sorry, you are not eligible for financial support.
                                    </div>
                                </div>

                                <div class="referral__form__fieldset__item referral__form__fieldset__item__select"
                                    style="display:none; color:#E44746;">

                                    <label for="greenkingincome">Combined monthly household*</label>

                                    <select name="greenkingincome" id="greenkingincome" class="eligibility-check">
                                        <option value="">
                                            Is your combined monthly household income less than £2500/month?
                                        </option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    <div id="greenkingincomeWarning" class="noyeartrade-ineligible ineligible">
                                        Sorry, you are not eligible for financial support.
                                    </div>
                                </div>


                                <div class=" referral__form__fieldset__item
                                        referral__form__fieldset__item-care_first_ref_number">

                                    <label for="care_first_reference_number">Care First Reference Number*</label>

                                    <input type="text" name="care_first_reference_number"
                                        id="care_first_reference_number" placeholder="Care First Reference Number"
                                        required>

                                </div>

                                <div class="referral__form__fieldset__item">

                                    <label for="number_of_people_in_household">Number of People in
                                        Household*</label>
                                    <input type="number" name="number_of_people_in_household"
                                        id="number_of_people_in_household" placeholder="Number of People in Household"
                                        required>

                                </div>

                                <div class="referral__form__fieldset__item">

                                    <label for="address">TIS/TC Name*</label>
                                    <input type="text" name="tic/tc_name" id="tic_tc_name" placeholder="TIS/TC Name"
                                        required>

                                </div>

                                <div class="referral__form__fieldset__item referral__form__fieldset__item-ref_reason">

                                    <label for="reason_for_referral">Reason for Referral*</label>

                                    <textarea class="referral__form__fieldset__item-ref_reason__textarea"
                                        name="reason_for_referral" id="reason_for_referral"
                                        placeholder="Reason for Referral - please include reasons for referral as well as employment history as well as how heard of the LTC"
                                        required></textarea>

                                </div>

                            </div>

                        </fieldset>

                        <label class="referral__form__fieldset__item gdpr-text__label" id="gdpr-text__label"
                            for="gdpr-text">

                            <span class="gdpr-text">

                                <?= $gdpr_text ?>

                            </span>

                        </label>

                        <!-- <div class="form-captcha">
                            <div class="g-recaptcha" data-sitekey="6Lc3lUYUAAAAAG7ZexO0WH0BZNeU74BLZBzyTZG0"></div>
                        </div> -->

                        <button type="submit" class="referral-form__send-button__inner button">Send
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

<script src="/wp-admin/themes/LTC/assets/scripts/pub-names.js"></script>

<script>
var pubsData = data;

function filterNames() {
    const input = jQuery('.referral-form #current_most_recent_employer').val().toLowerCase();
    const suggestions = [];
    const exactMatches = [];
    const partialMatches = [];

    console.log(input);

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
    const suggestionList = jQuery('.referral-form #nameSuggestions');
    suggestionList.empty();

    if (suggestions.length > 0) {
        for (var i = 0; i < suggestions.length; i++) {
            suggestionList.append(
                '<div class="suggestion" data-value="' +
                suggestions[i] +
                '">' +
                suggestions[i] +
                '</div>'
            );
        }

        suggestionList.css('display', 'flex');

        jQuery('#nameSuggestions').on('click', '.suggestion', function() {
            const selectedValue = jQuery(this).data('value');

            jQuery('.referral-form #current_most_recent_employer').val(
                selectedValue
            );
            jQuery('.referral-form #nameSuggestions').empty();

            suggestionList.css('display', 'none');
        });
    } else {
        // suggestionList.append('<div>No suggestions</div>');
    }
}
</script>