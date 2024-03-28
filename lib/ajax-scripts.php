<?php
// save the form
function relate_form_recaptcha(){
    global $wpdb,$post;

    $form_values = $_POST;

    $recaptcha_secret = '';
    $recaptcha_response = $form_values['token']; 

    // Make POST request to Google's verification endpoint
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response&remoteip=" . $_SERVER['REMOTE_ADDR']);
    $response = json_decode($response);

    // Check if the response indicates success or failure
    if (!$response->success) {
        echo 'Recaptcha is not passed';
        die();
    } else {
        echo 'Success';
        die();
    }
}

add_action("wp_ajax_relate_form_recaptcha", "relate_form_recaptcha");
add_action("wp_ajax_nopriv_relate_form_recaptcha", "relate_form_recaptcha");

// save the form
    function save_form_data(){
	    global $wpdb,$post;

    $user;
    
    if(is_user_logged_in()){
        $user = get_current_user_id();
    }

	    $args = $_POST;

	    // where do we send people
	    $last_page = $_SERVER['HTTP_REFERER'];

	    // // is logged in
	    // $user = $this->is_logged_in();
	    // if(!$user){
		//     $this->set_message('error','please login' );
		//     wp_redirect( $last_page );
		//     die;
	    // }

	    // check nonce
	    if(!isset($args['_form_nonce'])||!wp_verify_nonce($args['_form_nonce'],'form-filled')){
            echo 'validation failed';
		    //wp_redirect( $last_page );
		    die;
	    }

	    // unset system fields
	    $form_values = $args;
	    unset($form_values['_form_nonce']);
	    unset($form_values['_wp_http_referer']);
	    unset($form_values['_form_name']);
	    unset($form_values['_save_progress']);
	    unset($form_values['_page']);

        // var_dump($form_values);

	    // sanitize and check for extra fields being sent. Reject if unexpected fields in POST
	    $save_data = array();
	    if($form_values) {
		    foreach ( $form_values as $field_name => $field_value ) {
                // $found = false;
			    //     // doing str pos to allow for field prefixes like "CHECKBOX_" and "RADIO_"
				//     if (strpos($field_value, $field_name) !== false) {
				// 	    $found = true;
				// 	    break;
				//     }
		        // // if not found the add to errors
			    // if ( ! $found ) {
				//     $errors[] = 'Field invalid: ' . $field_name;
				//     continue;
			    // }
			    // if its array data then walk each item and filter it.
			    if(is_array($field_value)){
				    array_walk($field_value, function(&$item){
					    $item   = strip_tags( $item );
					    $item   = trim( $item );
//					    $item   = addslashes($item);
                    });
				    $save_data[ $field_name ]   = $field_value;
                }else{
			        // if just a value then filter just that value
				    $val                        = strip_tags( $field_value );
				    $val                        = trim( $val );
				    $save_data[ $field_name ]   = ($val);
                }
		    }
	    }

	    if(empty($save_data)){
		    $errors[] = 'No form data';
	    }
	    // If errors return false
	    if(!empty($errors)){
		    echo 'Validation failed: ' . implode(', ', $errors );
            //wp_redirect( $last_page );
		    die;
	    }

        $recaptcha_secret = '';
        $recaptcha_response = $form_values['token']; 

        // Make POST request to Google's verification endpoint
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response&remoteip=" . $_SERVER['REMOTE_ADDR']);
        $response = json_decode($response);

        // Check if the response indicates success or failure
        if (!$response->success) {
            echo 'Recaptcha is not passed';
            die();
        }

        if(isset($form_values['save_progress']) && $form_values['save_progress'] === 'true') {
	        // update or save
	        $sql = $wpdb->prepare( "SELECT * FROM `wp_ltc_forms_data` WHERE user_id = %d AND form_name = %s;", array( $user, 'volunteer-form.php' ));
	        $res = $wpdb->get_row( $sql, ARRAY_A );
	        if ( $res ) {
		        // Update
		        $wpdb->update( 'wp_ltc_forms_data',
			        array(
				        'form_data'  => json_encode( $save_data ),
				        'changed_on' => date( 'Y-m-d H:i:s' ),
			        ),
			        array( 'ID' => $res['ID'] ) );
	        } else {
		        // New
		        $wpdb->insert( 'wp_ltc_forms_data',
			        array(
				        'user_id'    => $user,
				        'form_name'  => 'volunteer-form.php',
				        'form_data'  => json_encode( $save_data ),
				        'changed_on' => date( 'Y-m-d H:i:s' ),
			        ) );
	        }

	        //$this->set_message('success','Progress saved' );
            echo 'Progress saved';
            
	        //wp_redirect( $last_page );
	        die;
        }else{
            // SEND TO CRM
	        $data_string = json_encode($save_data);
	        $Url  = 'https://prod-16.uksouth.logic.azure.com:443/workflows/b4fb05e45584476e9426c62e78eaa40a/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=NiF07DPUOLRVTLa8UAMTth-mqjnDmYJVoe7RDk_lw3U';
            $headers = array(
	            'Content-Type: application/json;charset=UTF-8',
	            'Content-Length: ' . strlen($data_string)
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $Url);
            //curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 20);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            $output = curl_exec($ch);
            curl_close($ch);

            // remove the saved data
	        $sql = $wpdb->prepare( "SELECT * FROM `wp_ltc_forms_data` WHERE user_id = %d", $user );
	        $res = $wpdb->get_row( $sql, ARRAY_A );
            if($res) {
	            $wpdb->delete( 'wp_ltc_forms_data', array( 'ID' => $res['ID'] ) );
            }


	        $admin_copy = '';
	        foreach ( $save_data as $k => $s ) {
	            if(is_array($s)){
		            $text = implode(', ',$s);
                }else{
		            $text = $s;
                }
		        $admin_copy .= '<div>'.$k.': '.$text.'</div>';
            }

            $e1 = wp_mail($user['email'],'subject to be written', 'content to be written', array('Content-Type: text/html; charset=UTF-8'));
            
            $e2 = wp_mail('poedgar@ukr.net','New form submission',$admin_copy,array('Content-Type: text/html; charset=UTF-8'));

            $e3 = wp_mail(get_field('email', 'option'),'New form submission',$admin_copy,array('Content-Type: text/html; charset=UTF-8'));

	        $query_args = array( 'the_page'=> 'form_sent' );
	        //$form_sent_link =  add_query_arg( $query_args,$this->base_page );
	        //wp_redirect( $form_sent_link );

            echo 'Request sent';
            die();

        }
    }

add_action("wp_ajax_save_form_data", "save_form_data");
add_action("wp_ajax_nopriv_save_form_data", "save_form_data");

function submit_form_ajax() {
    if (isset($_POST['first_name'])) {
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $category = sanitize_text_field($_POST['category']);
        $other_category = sanitize_text_field($_POST['otherlabel']);
        $email = sanitize_text_field($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $current_most_recent_employer = sanitize_text_field($_POST['current_most_recent_employer']);
        $enquiry_subject = sanitize_text_field($_POST['subject']);
        $enquiry = sanitize_text_field($_POST['enquiry']);
        $years_in_industry = sanitize_text_field($_POST['timelabe']);


        $subject = 'New Form Submission';
        $message = "First Name: $first_name<br/>";
        $message .= "Last Name: $last_name<br/>";
        $message .= "Category: $category<br/>";
        $message .= "Other category: $other_category<br/>";
        $message .= "Email: $email<br/>";
        $message .= "Phone: $phone<br/>";
        $message .= "Current Most Recent Employer: $current_most_recent_employer<br/>";
        $message .= "Subject: $enquiry_subject<br/>";
        $message .= "Enquiry: $enquiry";
        $message .= "Enquiry: $years_in_industry";

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
        );
        
        wp_mail('poedgar@ukr.net', $subject, $message, $headers);
        wp_mail(get_field('email', 'option'), $subject, $message, $headers);

        echo 'Form submitted successfully'; 
    }

    wp_die(); 
}

add_action('wp_ajax_submit_form', 'submit_form_ajax');
add_action('wp_ajax_nopriv_submit_form', 'submit_form_ajax');

function submit_form_ajax_packs() {
    if (isset($_POST['first_name'])) {
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $town_or_city = sanitize_text_field($_POST['town_or_city']);
        $address = sanitize_text_field($_POST['address']);
        $county = sanitize_text_field($_POST['county']);
        $pub_name = sanitize_text_field($_POST['pub_name']);
        $postcode = sanitize_text_field($_POST['post_code']);
        $number_of_packs = sanitize_text_field($_POST['number_of_packs']);

        
        $subject = 'New Form Submission';
        $message = "First Name: $first_name<br/>";
        $message .= "Last Name: $last_name<br/>";
        $message .= "Town or City: $town_or_city<br/>";
        $message .= "Address: $address<br/>";
        $message .= "county: $county<br/>";
        $message .= "Pub Name: $pub_name<br/>";
        $message .= "Postcode: $postcode<br/>";
        $message .= "Numbers of Packs: $number_of_packs";


        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
        );
        
        wp_mail('poedgar@ukr.net', $subject, $message, $headers);
        wp_mail(get_field('email', 'option'), $subject, $message, $headers);

        echo 'Form submitted successfully'; 
    }

    wp_die(); 
}

add_action('wp_ajax_submit_form_packs', 'submit_form_ajax_packs');
add_action('wp_ajax_nopriv_submit_form_packs', 'submit_form_ajax_packs');

function submit_form_ajax_referral() {
    if (isset($_POST['first_name'])) {
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name = sanitize_text_field($_POST['last_name']);
        $city = sanitize_text_field($_POST['city']);
        $address = sanitize_text_field($_POST['address_first_line']) . '<br/>' . sanitize_text_field($_POST['address_second_line']);
        $county = sanitize_text_field($_POST['county']);
        $phone = sanitize_text_field($_POST['phone']);
        $postcode = sanitize_text_field($_POST['post_code']);
        $email = sanitize_text_field($_POST['email']);
        $gender = sanitize_text_field($_POST['gender']);
        $date_of_birth = sanitize_text_field($_POST['day']) . '.' . sanitize_text_field($_POST['month']) . '.' . sanitize_text_field($_POST['year']);
        $category = sanitize_text_field($_POST['category']);
        $housing_status = sanitize_text_field($_POST['housing_status']);
        $family_status = sanitize_text_field($_POST['family_status']);
        $employment_status = sanitize_text_field($_POST['employment_status']);
        $number_of_years_in_trade = sanitize_text_field($_POST['number_of_years_in_trade']);
        $current_most_recent_employer = sanitize_text_field($_POST['current_most_recent_employer']);
        $care_first_reference_number = sanitize_text_field($_POST['care_first_reference_number']);
        $number_of_people_in_household = sanitize_text_field($_POST['number_of_people_in_household']);
        $tic_tc_name = sanitize_text_field($_POST['tic/tc_name']);
        $reason_for_referral = sanitize_text_field($_POST['reason_for_referral']);

        $subject = 'New Form Submission';
        $message = "First Name: $first_name<br/>";
        $message .= "Last Name: $last_name<br/>";
        $message .= "City: $city<br/>";
        $message .= "Address: $address<br/>";
        $message .= "County: $county<br/>";
        $message .= "Postcode: $postcode<br/>";
        $message .= "Phone: $phone<br/>";
        $message .= "Email: $email<br/>";
        $message .= "Gender: $gender<br/>";
        $message .= "Date of Birth: $date_of_birth<br/>";
        $message .= "Category: $category<br/>";
        $message .= "Housing Status: $housing_status<br/>";
        $message .= "Family Status: $family_status<br/>";
        $message .= "Employment Status: $employment_status<br/>";
        $message .= "Number of Years in Trade: $number_of_years_in_trade<br/>";
        $message .= "Current Most Recent Employer: $current_most_recent_employer<br/>";
        $message .= "Care First Reference Number: $care_first_reference_number<br/>";
        $message .= "Number of People in Household: $number_of_people_in_household<br/>";
        $message .= "TIC/TC name: $tic_tc_name<br/>";
        $message .= "Reason for Referral: $reason_for_referral<br/>";

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
        );
        
        wp_mail('poedgar@ukr.net', $subject, $message, $headers);
        wp_mail(get_field('email', 'option'), $subject, $message, $headers);

        echo 'Form submitted successfully' . $first_name; 
    }

    wp_die(); 
}

add_action('wp_ajax_submit_form_referral', 'submit_form_ajax_referral');
add_action('wp_ajax_nopriv_submit_form_referral', 'submit_form_ajax_referral');