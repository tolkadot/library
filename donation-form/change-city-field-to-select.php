<?php
/**
 * This code snipet shows how to change the City field in the
 * donation form to a selectable, dropdown field, with several
 * pre-set options.
 *
 * This shows in general how you can modify a donation field
 * using the Donation Fields API. The basic process involves
 * getting the field (shown below), then using the set() method
 * to change specific settings.
 */
add_action( 'init', function() {
	$cities = array(
		'New York',
		'Chicago',
		'San Francisco',
	);

	// Get the field.
	$field = charitable()->donation_fields()->get_field( 'city' );

	// In the admin donation form, change the type to select and
	// add our list of cities as options.
	$field->set( 'admin_form', 'type', 'select' );
	$field->set( 'admin_form', 'options', $cities );

	// Do the same in the front-end donation form.
	$field->set( 'donation_form', 'type', 'select' );
	$field->set( 'donation_form', 'options', $cities );
}, 100 );