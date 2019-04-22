<?php
/**
 * If you would like to enable the terms and conditions, privacy
 * policy and user contact consent fields in the registration form
 * but NOT the donation form, you can add the following bit of code.
 */
add_filter( 'charitable_donation_form_terms_fields', '__return_empty_array' );

/**
 * To disable only one of the terms & conditions, privacy policy or
 * user contact consent fields (rather than all three), adapt this.
 */
add_filter( 'charitable_donation_form_terms_fields', function( $fields ) {
	/* Remove the terms & conditions. */
	if ( charitable_is_terms_and_conditions_activated() ) {
		unset(
			$fields['terms_text'],
			$fields['accept_terms']
		);
	}

	/* Remove the privacy policy. */
	if ( charitable_is_privacy_policy_activated() ) {
		unset(
			$fields['privacy_policy_text']
		);
	}

	/* Remove the contact consent. */
	if ( charitable_is_contact_consent_activated() ) {
		unset(
			$fields['contact_consent']
		);
	}

	return $fields;
} );