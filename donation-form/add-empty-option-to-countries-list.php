<?php
/**
 * In this example we add an empty "Select your country"
 * option at the start of the list of countries in the
 * donation form.
 */
add_action(
	'init',
	function() {
		$fields    = charitable()->donation_fields();
		$field     = $fields->get_field( 'country' );
		$form      = $field->donation_form;
		$countries = array_merge(
			array( '' => 'Select your country' ),
			$form['options']
		);

		$field->set( 'donation_form', 'options', $countries );
		$field->set( 'donation_form', 'default', '' );
	}
);
