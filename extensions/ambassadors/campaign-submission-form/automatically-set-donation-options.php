<?php

/** 
 * Remove "Donation Options" section from campaign submission form.
 *
 * @param   string[] $fields
 * @return  string[] $fields
 */ 
function en_remove_donation_options_fields( $fields ) {
    unset( $fields[ 'donation_fields' ] );
    return $fields;
}

add_filter( 'charitable_campaign_submission_fields', 'en_remove_donation_options_fields' );

/** 
 * Programatically set the suggested donations. 
 *
 * @param   mixed[] $submitted
 * @param   int $campaign_id
 * @return  void
 */
function en_set_suggested_donations( $submitted, $campaign_id ) {

    // Each donation amount is an array with an amount and description.
    update_post_meta( $campaign_id, '_campaign_suggested_donations', array(
        array(
            'amount' => 12, 
            'description' => __( 'Small', 'your-namespace' )
        ), 
        array(
            'amount' => 47, 
            'description' => __( 'Medium', 'your-namespace' )
        ), 
        array(
            'amount' => 94, 
            'description' => __( 'Large', 'your-namespace' )
        )
    ) );

    // Also set the custom donations to be permitted.
    update_post_meta( $campaign_id, '_campaign_allow_custom_donations', 1 );

}

add_action( 'charitable_campaign_submission_save', 'en_set_suggested_donations', 10, 2 );
