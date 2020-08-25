<?php
/**
 * In this snippet, we add a custom field to the campaign submission form
 * which will only show when creating a fundraiser for a specific existing
 * campaign (in this case, the parent campaign has an ID of 50).
 *
 * This snippet requires Ambassadors 2+.
 */

/**
 * This function adds a custom text field to the campaign submission
 * form, as well as the admin campaign editor, campaign emails, and
 * campaign export.
 */
add_action( 'init', function( $fields ) {
	$fields = charitable()->campaign_fields();

	// Create the field.
	$field = new Charitable_Campaign_Field(
		'custom_text_field',
		[
			'label'          => 'Custom Text Field',
			'data_type'      => 'meta',
			'campaign_form'  => [
				'required' => true,
				'type'     => 'text',
				'section'  => 'campaign-details',
			],
			'admin_form'     => true,
			'show_in_export' => true,
			'email_tag'      => true,
		]
	);

	// Register the field.
	$fields->register_field( $field );
} );

/**
 * In this function we remove the field from any campaign submission
 * form that is not a fundraiser form for the parent campaign
 * with an ID of 50.
 *
 * Adapt this to your case by replacing 50 with the ID of your parent
 * campaign.
 */
add_filter( 'charitable_campaign_submission_campaign_fields', function( $fields, $form ) {
	if ( method_exists( $form, 'get_parent_campaign' ) && 50 === $form->get_parent_campaign()->ID ) {
		return $fields;
	}

	unset( $fields['custom_text_field'] );
	return $fields;
}, 10, 2 );

/**
 * Campaign form fields are not automatically including in fundraiser
 * forms and have to be added to a list of included fields.
 */
add_filter( 'charitable_ambassadors_fundraiser_form_field_whitelist', function( $whitelist ) {
	$whitelist[] = 'custom_text_field';
	return $whitelist;
} );