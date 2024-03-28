<?php
function ltc_enqueue_form_scripts() {
    // Enqueue jQuery
    // wp_enqueue_script('jquery');

    // // Enqueue your custom form script
    // wp_enqueue_script('form-script', get_template_directory_uri() . '/assets/scripts/forms.js', array('jquery'), null, true);

    // // Localize the script with the ajax_url
    // wp_localize_script('form-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

    // if (is_single()) {
    //     // Enqueue your JavaScript file
    //     wp_enqueue_script('single', get_template_directory_uri() . '/assets/scripts/single.js', array('jquery'), null, true);

    // }
}

add_action('wp_enqueue_scripts', 'ltc_enqueue_form_scripts');