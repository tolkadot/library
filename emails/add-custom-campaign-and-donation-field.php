<?php
/**
 * In this example, a new email field is added which can be used both in
 * campaign emails and donation emails. The field gets a value for a specific
 * campaign, which in the case of a donation-specific email, will be the
 * campaign that received the donation.
 */

/**
 * Display the field based on a campaign-specific value.
 *
 * This field can be used for any campaign-related emails or
 * donation-related emails. If an email is not related to either of
 * those, nothing will be shown.
 *
 * @param  string           $value The default value to show.
 * @param  array            $args  Set of additional arguments available.
 * @param  Charitable_Email $email The email object.
 * @return string
 */
function ed_charitable_get_email_field_value( $value, $args, $email ) {
	$campaign = $email->get_campaign();

	if ( is_null( $campaign ) ) {
		$donation = $email->get_donation();

		if ( is_null( $donation ) ) {
			return '';
		}

		$campaign_id = current( $donation->get_campaign_donations() )->campaign_id;
		$campaign    = charitable_get_campaign( $campaign_id );
	}

    return $campaign->get( 'some_field' );
}

/**
 * Register an email field.
 *
 * @param  array $fields All the registered fields.
 * @return array
 */
function ed_charitable_add_email_field( $fields ) {
    $fields['some_field'] = array(
        'description' => 'A description of this field',
        'preview'     => 'Placeholder value',
        'callback'    => 'ed_charitable_get_email_field_value',
    );

    return $fields;
}

add_filter( 'charitable_email_campaign_fields', 'ed_charitable_add_email_field' );
add_filter( 'charitable_email_donation_fields', 'ed_charitable_add_email_field' );