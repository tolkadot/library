<?php
/**
 * Add an extra column to the donation export.
 *
 * @param  array $columns The default set of columns.
 * @return array
 */
function ed_charitable_add_donation_export_column( $columns ) {
    return array_merge( $columns, array( 'campaign_description' => 'Campaign Description' ) );
}

add_filter( 'charitable_export_donations_columns', 'ed_charitable_add_donation_export_column' );

/**
 * Set the value to show in the cell.
 *
 * @param  string $value The existing value.
 * @param  string $key   The key of the field. Note: This function will be called for every cell, so
 *                       you need to check and make sure you only set the value of the field we added.
 * @param  array  $data  The data for the table row.
 * @return string
 */
function ed_charitable_set_donation_export_cell_value( $value, $key, $data ) {
    if ( 'campaign_description' != $key ) {
        return $value;
    }

    return charitable_get_campaign( $data['campaign_id'] )->description;
}

add_filter( 'charitable_export_data_key_value', 'ed_charitable_set_donation_export_cell_value', 10, 3 );
