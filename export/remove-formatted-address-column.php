<?php

/**
 * Removing a column from the donations export sheet is easy enough.
 *
 * You just need to call the unset() function with the correct key. Below
 * is an example showing how to remove the formatted address column,
 * but you can adapt this to remove any column. Here are the default columns:
 *
 * 'donation_id'
 * 'campaign_id'
 * 'campaign_name'
 * 'first_name'
 * 'last_name'
 * 'email'
 * 'address'
 * 'address_2'
 * 'city'
 * 'state'
 * 'postcode'
 * 'country'
 * 'phone'
 * 'address_formatted'
 * 'amount'
 * 'date'
 * 'time'
 * 'status'
 * 'donation_gateway'
 */
function ed_remove_formatted_address_column_from_donations_export( $columns ) {
	unset( $columns['address_formatted'] );
	return $columns;
}

add_filter( 'charitable_export_donations_columns', 'ed_remove_formatted_address_column_from_donations_export' );
