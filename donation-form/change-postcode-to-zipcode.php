<?php
/**
 * Change the "Postcode" field into a "ZIP Code" field.
 *
 * @param   array[] $fields
 * @return  array[]
 */
add_action(
	'init',
	function ( $fields ) {
		$fields       = charitable()->donation_fields();
		$field        = $fields->get_field( 'postcode' );
		$field->label = 'ZIP Code';
		$field->set( 'donation_form', 'label', 'ZIP Code' );
	},
	11
);
