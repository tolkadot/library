<?php
/**
 * Add fields to the registration form.
 *
 * @param  array $fields
 * @return array
 */
add_filter(
	'charitable_user_registration_fields',
	function( $fields ) {
		/* Add a text field. */
		$fields['text_field'] = [
			'type'      => 'text',
			'label'     => 'My Text Field',
			'priority'  => 10,
			'required'  => false,
			'value'     => isset( $_POST['text_field'] ) ? $_POST['text_field'] : '',
		];

		/* Add a checkbox. */
		$fields['checkbox_field'] = [
			'type'      => 'checkbox',
			'label'     => 'My Checkbox Field',
			'priority'  => 12,
			'required'  => false,
			'checked'   => isset( $_POST['checkbox_field'] ) && $_POST['checkbox_field'],
		];

		/* Add a checkbox. */
		$fields['select_field'] = [
			'type'      => 'select',
			'label'     => 'My Select Field',
			'priority'  => 14,
			'required'  => false,
			'value'     => isset( $_POST['select_field'] ) ? $_POST['select_field'] : '',
			'options'   => [
				'option_1' => 'Option 1',
				'option_2' => 'Option 2',
			],
		];

		return $fields;
	}
);
