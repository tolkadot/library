<?php
/**
 * This example shows how to remove columns from the Donations export.
 *
 * Since this relies on the Donation Fields API, it requires Charitable 1.5+.
 *
 * For a way of doing this on older versions of Charitable, or where the column
 * you want to add is not registered in the Donation Fields API, see:
 *
 * @see https://github.com/Charitable/library/blob/master/export/legacy/add-extra-column.php
 */
add_action(
	'init',
	function() {
		$fields_api = charitable()->donation_fields();

		/**
		 * In this example, we add the 'donor' field to the export. But you can
		 * easily modify this example to remove any other fields by swapping
		 * 'donor' for the key of the field you would like to add:
		 *
		 * donor
		 * campaigns
		 * amount_formatted
		 * status
		 * donation_gateway
		 * donation_key
		 * donation_summary
		 */
		$fields_api->get_field( 'donor' )->show_in_export = true;
	}
);
