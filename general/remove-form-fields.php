<?php 
/**
 * This example shows how to remove a field from a form. 
 *
 * Our examples below remove the 'phone' field from the Donation Form and Profile Form.
 *
 * Most of the forms that are used on the frontend in Charitable
 * include filters to allow you to remove fields. Below, we list
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

/**
 * Remove the 'phone' field from the Donation Form.
 *
 * @param   array $fields All of the fields to be displayed in the form.
 * @return  array
 */
function ed_remove_phone_field_from_donation_form( $fields ) {
    unset( $fields['phone'] );
    return $fields;
}

add_filter( 'charitable_donation_form_user_fields', 'ed_remove_phone_field_from_donation_form' );

/**
 * Remove the 'phone' field from the Profile Form (User Address section).
 *
 * @param   array $fields All of the fields to be displayed in the form.
 * @return  array
 */
function ed_remove_phone_field_from_profile_form( $fields ) {
    unset( $fields['phone'] );
    return $fields;
}

add_filter( 'charitable_user_address_fields', 'ed_remove_phone_field_from_donation_form' );