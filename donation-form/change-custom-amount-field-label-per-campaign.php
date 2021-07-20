<?php
/**
 * Filter the custom amount field description on a per campaign basis.
 *
 * @param  string $label The default label.
 * @return string
 */
function ed_charitable_donation_form_set_custom_amount_field_text_per_campaign( $label ) {
	$campaign_id = charitable_get_current_campaign_id();

	if ( 226 === $campaign_id ) {

		// The label for the campaign with an ID of 226
		$label = 'Custom amount label';

	} elseif ( 123 === $campaign_id ) {

		// The label for the campaign with an ID of 123
		$label = 'Another custom amount label';

	} else {

		// The label for all other campaigns.
		$label = 'Default amount label';
	}

	return $label;
}

add_filter( 'charitable_donation_amount_form_custom_amount_text', 'ed_charitable_donation_form_set_custom_amount_field_text_per_campaign' );

/* To use the same text for the Recurring Donations custom amount text, include the following line. */
add_filter( 'charitable_recurring_donation_amount_form_custom_amount_text', 'ed_charitable_donation_form_set_custom_amount_field_text_per_campaign' );
