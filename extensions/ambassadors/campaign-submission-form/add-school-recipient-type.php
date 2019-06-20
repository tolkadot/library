<?php
/**
 * Register a new recipient type.
 */
add_action(
	'init',
	function() {
		charitable_register_recipient_type(
			'school',
			[
				'label' => 'Your School',
				'description' => 'Raise money for your school',
				'admin_label' => 'School',
				'admin_description' => 'Campaign creators can raise money for their school.',
				'options' => [
					'school-1' => 'School 1',
					'school-2' => 'School 2',
					'school-3' => 'School 3',
				],
			]
		);
	}
);

/**
 * Add additional fields to the "Who are you raising money for?" page
 * when your recipient type is selected.
 *
 * @param  array  $fields         The default fields to show.
 * @param  string $recipient_type The recipient type to add fields for.
 * @return array
 */
add_filter(
	'charitable_recipient_type_fields',
	function( $fields, $recipient_type ) {
		if ( 'school' != $recipient_type ) {
			return $fields;
		}

		$fields['school'] = [
			'type'      => 'select',
			'priority'  => 2,
			'data_type' => 'meta',
			'options'   => [
				'school-1' => 'School 1',
				'school-2' => 'School 2',
				'school-3' => 'School 3',
			],
			'required'  => true,
		];

		return $fields;
	},
	10,
	2
);