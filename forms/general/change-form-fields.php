<?php 
/**
 * This example shows how to change fields in a form.
 *
 * In the example below we're changing fields in the user section 
 * of the donation form.
 *
 * Most of the forms that are used on the frontend in Charitable
 * include filters to allow you to change labels. Below, we list
 * out each form along with the hook you should use to alter it,
 * and the list of fields that are in that form by default:
 *
 * - Registration form: charitable_user_registration_fields
 * --- 'user_email'
 * --- 'user_login'
 * --- 'user_pass'
 *
 * - Profile form (user section): charitable_user_fields
 * --- 'first_name'
 * --- 'last_name'
 * --- 'user_email'
 * --- 'organisation'
 * --- 'description'
 *
 * - Profile form (address section): charitable_user_address_fields
 * --- 'address'
 * --- 'address_2'
 * --- 'city'
 * --- 'state'
 * --- 'postcode'
 * --- 'country'
 * --- 'phone'
 *
 * - Profile form (social section): charitable_user_social_fields
 * --- 'user_url'
 * --- 'twitter'
 * --- 'facebook'
 *
 * - Donation form (user section): charitable_donation_form_user_fields
 * --- 'first_name'
 * --- 'last_name'
 * --- 'email'
 * --- 'address'
 * --- 'address_2'
 * --- 'city'
 * --- 'state'
 * --- 'postcode'
 * --- 'country'
 * --- 'phone'
 * 
 * - Donation form (donation amount section): charitable_donation_form_donation_fields
 * --- 'donation_amount'
 * 
 * - Campaign form (campaign section): charitable_campaign_submission_campaign_fields
 * --- 'post_title'
 * --- 'description'
 * --- 'goal'
 * --- 'length'
 * --- 'post_content'
 * --- 'image'
 * --- 'campaign_category'
 * --- 'campaign_tag'
 *
 * - Campaign form (donation options section): charitable_campaign_submission_donation_options_fields
 * --- 'donation_options' 
 * --- 'suggested_donations'
 * --- 'allow_custom_donations' 
 *
 * - Campaign form (user section): charitable_campaign_submission_user_fields

 * --- 'first_name'
 * --- 'last_name'
 * --- 'user_email'
 * --- 'city'
 * --- 'state'
 * --- 'country'
 * --- 'user_description'
 * --- 'organisation'
 */
function ed_charitable_change_donation_form_fields( $fields ) {

    /**
     * Change the label of the Address 2 field.
     */
    $fields['address_2']['label'] = __( 'Address (continued)', 'your-namespace' );

    /**
     * Change the placeholder shown inside the field when it hasn't been set yet.
     */
    $fields['first_name']['placeholder'] = __( 'Your first name', 'your-namespace' );
    $fields['last_name']['placeholder'] = __( 'Your surname / last name', 'your-namespace' );

    /**
     * Change a few fields to required.
     */
    $fields['address']['required'] = true;
    $fields['city']['required'] = true;
    $fields['state']['required'] = true;
    $fields['postcode']['required'] = true;
    $fields['country']['required'] = true;

    /**
     * Change the last name field to not be required.
     */
    $fields['last_name']['required'] = false;

    /**
     * Remove the Phone field.
     */
    unset( $fields['phone'] );

    /**
     * Change the State field to a dropdown select.
     */
    $fields['state']['type'] = 'select';
    $fields['state']['options'] = array(        
        'international' => 'Outside North America', // Extra option
        'United States' => include( charitable()->get_path( 'directory' ) . 'i18n/states/US.php' ),
        'Canada' => include( charitable()->get_path( 'directory' ) . 'i18n/states/CA.php' ),
    );

    /**
     * Move the Postcode / ZIP code field above the State field using the 'priority' setting.
     */
    $fields['postcode']['priority'] -= 2;

    return $fields;
}

add_filter( 'charitable_donation_form_user_fields', 'ed_charitable_change_donation_form_fields' );