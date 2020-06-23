<?php
/**
 * This function adds a custom text field to the campaign submission
 * form, as well as the admin campaign editor, campaign emails, and
 * campaign export.
 *
 * Note: This example requires Ambassadors 2+. For an example that worked
 * on previous version, see the link below.
 *
 * @see https://github.com/Charitable/library/blob/master/extensions/ambassadors/legacy/add-text-field.php
 *
 * @return void
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
