<?php
/**
 * In this example we modify the Donor Comment field for a specific campaign.
 */
add_filter(
	'charitable_donation_form_meta_fields',
	function( $fields, Charitable_Donation_Form $form ) {

		/**
		 * Only do this for the campaign with ID 14.
		 */
		if ( 14 == $form->get_campaign()->ID ) {

			/* Access the donor comment field. */
			$field = $fields['donor_comment'];

			/**
			 * Modify the field. In this case, we're making it a required
			 * field and also changing the placeholder text.
			 */
			$field['required']    = true;
			$field['placeholder'] = 'My custom placeholder text.';

			/* Update the donor comment field. */
			$fields['donor_comment'] = $field;
		}

		return $fields;
	},
	10,
	2
);
