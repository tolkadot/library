<?php
/**
 * This snippet shows how to alter the postcode field so
 * that it only accepts numbers and is between 4 and 6
 * characters long.
 *
 * However, this example more generally shows how you can
 * force a field value to match a certain regex pattern.
 *
 * @param  array $fields The fields in the form.
 * @return array
 */
function ed_set_required_format_for_postcode_field( $fields ) {
	/* If a postcode field doesn't exist, stop right here. */
	if ( ! array_key_exists( 'postcode', $fields ) ) {
		return $fields;
	}

	/* Make sure that 'attrs' exists in the field. */
	if ( ! array_key_exists( 'attrs', $fields['postcode'] ) ) {
		$fields['postcode']['attrs'] = [];
	}

	/**
	 * This defines the format of the postcode as being a
	 * string of numbers ([0-9]) with a length between 4 and
	 * 6 characters ({4,6}).
	 */
	$pattern = '[0-9]{4,6}';

	/**
	 * Add the pattern to the field by adding it to the
	 * `attrs` array.
	 */
	$fields['postcode']['attrs']['pattern'] = $pattern;

	return $fields;
}

add_filter( 'charitable_donation_form_user_fields', 'ed_set_required_format_for_postcode_field' );
add_filter( 'charitable_user_address_fields', 'ed_set_required_format_for_postcode_field' );
add_filter( 'charitable_campaign_submission_user_fields', 'ed_set_required_format_for_postcode_field' );