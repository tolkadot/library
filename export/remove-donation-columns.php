<?php
/**
 * This example shows how to remove columns from the Donations export.
 *
 * Since this relies on the Donation Fields API, it requires Charitable 1.5+.
 *
 * For a way of doing this on older versions of Charitable, see:
 *
 * @see https://github.com/Charitable/library/blob/master/export/legacy/remove-formatted-address-column.php
 */
add_action(
	'init',
	function() {
		$fields_api = charitable()->donation_fields();

		/**
		 * In this example, we remove the last name field. But you can
		 * easily modify this example to remove any other fields by swapping
		 * 'last_name' for the key of the field you would like to remove.
		 *
		 * first_name
		 * last_name
		 * email
		 * donor_address (full formatted address)
		 * address
		 * address_2
		 * city
		 * state
		 * postcode
		 * country
		 * phone
		 * campaign_categories_list
		 * date
		 * time
		 * status_label
		 * gateway_label
		 * test_mode
		 * contact_consent
		 */
		$fields_api->get_field( 'donor_address' )->show_in_export = false;
		$fields_api->get_field( 'campaign_categories_list' )->show_in_export = false;
	}
);
