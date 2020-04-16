<?php
/**
 * This example shows how to change which fields are required/not required
 * in the Your Details part of the campaign form.
 *
 * For a more general example of how to change any field in ANY Charitable
 * form to required/not required:
 *
 * @see https://github.com/Charitable/library/tree/master/forms/general/make-form-fields-required-not-required.php
 */
add_filter(
	'charitable_campaign_submission_user_fields',
	function( $fields ) {
		/**
		 * These are the keys of the fields included in the
		 * User Details section of the campaign form.
		 * - first_name
		 * - last_name
		 * - user_email
		 * - city
		 * - state
		 * - country
		 * - user_description
		 * - organisation
		 */

		/**
		 * Make certain fields required.
		 */
		$required_fields = [
			'city',
			'state',
			'country'
		];

		foreach ( $required_fields as $field ) {
			$fields[ $field ]['required'] = true;
		}

		/**
		 * Make some fields NOT required.
		 */
		$non_required_fields = [
			'first_name',
			'last_name',
		];

		foreach ( $non_required_fields as $field ) {
			$fields[ $field ]['required'] = false;
		}

		return $fields;
	}
);
