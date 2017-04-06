<?php 

/**
 * This example shows how you can add a new field to your donation-related
 * emails which shows the offline payment instructions for offline donations.
 */

/**
 * Register the extra field.
 *
 * @param   array            $fields
 * @param   Charitable_Email $email
 * @return  array
 */
function ed_charitable_add_offline_instructions_email_shortcode( $fields, Charitable_Email $email ) {

    if ( ! in_array( 'donation', $email->get_object_types() ) ) {
        return $fields;
    }

    $fields['offline_instructions'] = array(
        'description' => __( 'Show Offline Donation instructions (only shown for Offline donations)', 'your-namespace' ),
        'callback'    => 'ed_charitable_show_offline_donation_instructions',
    );

    return $fields;

}

add_filter( 'charitable_email_content_fields', 'ed_charitable_add_offline_instructions_email_shortcode', 10, 2 );

/**
 * Get the content to be displayed for the extra donation field.
 *
 * @param   string           $default
 * @param   array            $args
 * @param   Charitable_Email $email
 * @return  string
 */
function ed_charitable_show_offline_donation_instructions( $default, $args, $email ) {

    if ( ! $email->has_valid_donation() ) {
        return '';
    }

    /** 
     * Only show this for Offline Donations.
     */
    if ( 'offline' != $email->get_donation()->get_gateway() ) {
        return $email->get_donation()->get_gateway();
    }

    return wpautop( charitable_get_option(
        array( 'gateways_offline', 'instructions' ),
        __( 'Thank you for your donation. We will contact you shortly for payment.', 'charitable' ) ) 
    );

}

/**
 * To help with previewing emails, you can also define a fake value for your field.
 *
 * @param   array            $fields
 * @param   Charitable_Email $email
 * @return  array
 */
function ed_charitable_preview_offline_instructions_email_field( $fields, Charitable_Email $email ) {

    if ( ! in_array( 'donation', $email->get_object_types() ) ) {
        return $fields;
    }

    $fields['offline_instructions'] = wpautop( charitable_get_option( array( 'gateway_offline', 'instructions' ) ) );

    return $fields;

}

add_filter( 'charitable_email_preview_content_fields', 'ed_charitable_preview_offline_instructions_email_field', 10, 2 );