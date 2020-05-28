<?php
/**
 * Move fields out of the "Your Details" section, into the "Campaign Details" section.
 *
 * @param  array $fields All of the campaign form fields.
 * @return array
 */
add_filter( 'charitable_campaign_submission_fields', function( $fields ) {
	// To remove any fields from the form altogether, remove them from this list.
	$moved = [
		'first_name',
		'last_name',
		'user_email',
		'city',
		'state',
		'country',
		'user_description',
		'organisation',
	];

	foreach ( $moved as $key ) {
		if ( ! array_key_exists( $key, $fields['user_fields']['fields'] ) ) {
			continue;
		}

		$fields['user_fields']['fields'][ $key ] = $fields['campaign_fields']['fields'][ $key ];
	}

	// Finally, remove the "Your Details" section.
    unset( $fields['user_fields'] );

    return $fields;
} );