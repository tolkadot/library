<?php
/**
 * Add placeholder attributes to donation fields, removing the label field.
 *
 * @return void
 */
add_action(
    'init',
    function() {
        $fields = charitable()->donation_fields();

		foreach ( $fields->get_donation_form_fields() as $field ) {
			$label = $field->donation_form['label'];

			if ( isset( $field->donation_form['required'] ) && $field->donation_form['required'] ) {
				$label .= ' *';
			}

			$field->set( 'donation_form', 'placeholder', $label );
			$field->set( 'donation_form', 'label', false );
		}
    }
);

/**
 * In order to hide the asterisk for required fields, the following
 * custom CSS is also required.

#charitable-donation-form .charitable-form-field .required {
    display: none;
}

*/