<?php
/**
 * Change the "State" field into a "Province" field.
 *
 * @param   array[] $fields
 * @return  array[]
 */
add_action(
	'init',
	function ( $fields ) {
		$fields = charitable()->donation_fields();
		$field  = $fields->get_field( 'state' );

		// Change it to a select/drop-down field.
		$field->set( 'donation_form', 'type', 'select' );

		// Load all US states.
		$states = [
			'outside-usa' => 'Outside USA',
			'US States'   => include( charitable()->get_path( 'directory', true ) . 'i18n/states/US.php' ),
		];

		$field->set( 'donation_form', 'options', $states );

		// Set the default state.
		$field->set( 'donation_form', 'default', 'TX' );

		return $fields;
	}
);
