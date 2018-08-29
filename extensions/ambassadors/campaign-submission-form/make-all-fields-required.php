<?php
/**
 * Make all fields required in the Campaign Form.
 *
 * @param array $fields All of the fields to be displayed in the form.
 * @return array
 */
function ed_charitable_make_campaign_submission_form_fields_required( $fields ) {
    foreach ( $fields as $key => $field ) {
        $fields[ $key ]['required'] = true;
    }

    return $fields;
}

add_filter( 'charitable_campaign_submission_user_fields', 'ed_charitable_make_campaign_submission_form_fields_required' );
add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_make_campaign_submission_form_fields_required' );
add_filter( 'charitable_campaign_submission_payment_fields', 'ed_charitable_make_campaign_submission_form_fields_required' );