<?php
/**
 * If you want to add an email tag for an existing donation field,
 * you can use the code sample below.
 *
 * To add a completely custom email tag field, you can either register
 * a field using the Donation Fields API and give it an email tag,
 * or just create the email tag on its own. The former solution is easier
 * to implement and should be used in most cases.
 *
 * Create field using the Donation Fields API:
 * @see https://github.com/Charitable/library/blob/82870ccc79eefb94dc7466806d66a188945060a8/donation-form/register-new-donation-field-1.5.php
 *
 * Create a custom donation email tag:
 * @see https://github.com/Charitable/library/blob/8476c785b3ebb3ea6c59a5e4b544b37b4a491b5c/emails/add-custom-donation-field.php
 */
add_action(
	'init',
	function() {
		$fields_api = charitable()->donation_fields();

		/**
		 * In this example, we add an email tag for the last name field. But you
		 * can easily modify this example to remove any other fields by swapping
		 * 'last_name' for the key of the field you would like to add an email
		 * tag for.
		 *
		 * last_name
		 * address - first address line
		 * address_2
		 * city
		 * state
		 * postcode
		 * country
		 * phone
		 * time
		 * gateway_label
		 * test_mode
		 */
		$fields_api->get_field( 'last_name' )->email_tag = array(
			'description' => 'The last name of the donor',
			'preview'     => 'Smith',
		);
	}
);
