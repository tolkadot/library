<?php
/**
 * This code snipet shows how to change the Country field in the
 * donation form to a hidden field with a hard-coded default value.
 *
 * This shows in general how you can modify a donation field
 * using the Donation Fields API. The basic process involves
 * getting the field (shown below), then using the set() method
 * to change specific settings.
 */
add_action(
	'init',
	function() {
		// Get the field.
		$field = charitable()->donation_fields()->get_field( 'country' );

		// Make it a hidden field.
		$field->set( 'donation_form', 'type', 'hidden' );

		// Set the value to 'US'.
		$field->set( 'donation_form', 'value', 'US' );

		// Repeat the same in the admin donation form.
		$field->set( 'admin_form', 'type', 'hidden' );
		$field->set( 'admin_form', 'value', 'US' );
	},
	100
);
