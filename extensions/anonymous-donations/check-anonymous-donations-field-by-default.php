<?php
/**
 * Make the Anonymous Donations checkbox checked by default.
 */
add_action(
	'init',
	function() {
	// Get the field.
	$field = charitable()->donation_fields()->get_field( 'anonymous_donation' );

	// In the donation form, change the default to 1.
	$field->set( 'donation_form', 'default', 1 );
}, 100 );