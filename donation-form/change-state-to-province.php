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
		$field->label = 'Province';
		$field->set( 'donation_form', 'label', 'Province' );
	},
	11
);
