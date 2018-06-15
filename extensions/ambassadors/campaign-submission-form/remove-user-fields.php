<?php
/**
 * Remove the entire "Your Details" section from the campaign form.
 *
 * @param  array $fields All of the campaign form fields.
 * @return array
 */
function ed_charitable_ambassadors_remove_user_fields( $fields ) {
    unset( $fields['user_fields'] );
    return $fields;
}

add_filter( 'charitable_campaign_submission_fields', 'ed_charitable_ambassadors_remove_user_fields' );