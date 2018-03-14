<?php
/**
 * Automatically check the "Make it monthly" checkbox in the donation form.
 *
 * @param  array $fields The collection of form fields.
 * @return array
 */
function ed_charitable_recurring_pre_check_monthly( $fields ) {
	if ( ! array_key_exists( 'recurring_donation', $fields ) ) {
		return $fields;
	}

	if ( 'checkbox' != $fields['recurring_donation']['type'] ) {
		return $fields;
	}

	$fields['recurring_donation']['checked'] = array_key_exists( 'recurring_donation', $_POST ) ? $_POST['recurring_donation'] : true;

	return $fields;
}

add_filter( 'charitable_donation_form_donation_fields', 'ed_charitable_recurring_pre_check_monthly', 20 );
