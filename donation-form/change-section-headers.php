<?php
/**
 * Change the section headers in the donation form.
 *
 * @param  array $fields All the donation form fields.
 * @return array
 */
function ed_charitable_change_donation_form_section_headers( $fields ) {
	// "Your Donation"
	$fields['donation_fields']['legend'] = 'Choose Your Donation Amount';
	
	// "Details"
	$fields['details_fields']['legend'] = 'Your Information';

	// "Payment"
	$fields['payment_fields']['legend'] = 'Payment Information';
	
	// Finally, return the modified fields array.
	return $fields;
}

add_filter( 'charitable_donation_form_fields', 'ed_charitable_change_donation_form_section_headers', 20 );