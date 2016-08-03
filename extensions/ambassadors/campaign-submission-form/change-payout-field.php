<?php 

/**
 * This example shows how to change the payment details field
 * in Charitable Ambassadors to a general purpose textarea field
 * where the campaign creator can enter their payment details.
 */
function ed_ambassadors_set_campaign_payout_field( $fields ) {
	if ( ! isset( $fields['paypal'] ) ) {
		return $fields;
	}

	$fields['paypal']['label'] = __( 'Please enter your bank/mobile wallet/paypal details', 'your-namespace' );
	$fields['paypal']['type']  = 'textarea';

	return $fields;

}

add_filter( 'charitable_campaign_submission_payment_fields', 'ed_ambassadors_set_campaign_payout_field' );
