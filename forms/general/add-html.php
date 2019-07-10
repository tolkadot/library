<?php

/**
 * This example shows how to add HTML to a form.
 *
 * You can modify the positioning of the HTML by changing the 'priority'
 * parameter. Fields are displayed in order according to their priority,
 * from low to high.
 *
 * Most of the forms that are used on the frontend in Charitable
 * include filters to allow you to add extra fields. You can adapt
 * the example below to work with another form by switching the hook
 * that is used:
 *
 * - Registration form: charitable_user_registration_fields
 * - Profile form (user section): charitable_user_fields
 * - Profile form (address section): charitable_user_address_fields
 * - Profile form (social section): charitable_user_social_fields
 * - Donation form (user section): charitable_donation_form_user_fields
 * - Donation form (donation amount section): charitable_donation_form_donation_fields
 * - Campaign form (campaign section): charitable_campaign_submission_campaign_fields
 * - Campaign form (donation options section): charitable_campaign_submission_donation_options_fields
 * - Campaign form (user section): charitable_campaign_submission_user_fields
 *
 * The example below adds a field to the campaign creation form in Charitable Ambassadors.
 *
 * @param  array $fields
 * @return array
 */
add_filter(
	'charitable_campaign_submission_campaign_fields',
	function( $fields ) {
		$fields['html_field'] = array(
			'type'      => 'content',
			'priority'  => 100,
			'content'   => '<button id="my-button">Button</button>',
		);
		return $fields;
	}
);
