<?php
/**
 * By default, Charitable will allow donors to select any country in the world
 * when they donate, update their profile or submit a fundraising campaign.
 *
 * In the examples below, we alter each of these forms to limit the list of accepted
 * countries to a specific few.
 *
 * @param  array $fields The fields in the form.
 * @return array
 */
function ed_set_list_of_accepted_countries( $fields ) {
	/* If a country field doesn't exist, stop right here. */
	if ( ! array_key_exists( 'country', $fields ) ) {
		return $fields;
	}

	/**
	 * List of accepted countries.
	 *
	 * Note that these should be listed as an array where the
	 * key is the country code and the value is the name of the
	 * country.
	 *
	 * In the example below, we limit the list to just the Benelux
	 * countries.
	 */
	$options = [
		'BE' => 'Belgium',
		'LU' => 'Luxembourg',
		'NL' => 'Netherlands',
	];

	$fields['country']['options'] = $options;

	return $fields;
}

add_filter( 'charitable_donation_form_user_fields', 'ed_set_list_of_accepted_countries' );
add_filter( 'charitable_user_address_fields', 'ed_set_list_of_accepted_countries' );
add_filter( 'charitable_campaign_submission_user_fields', 'ed_set_list_of_accepted_countries' );
