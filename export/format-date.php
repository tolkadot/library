<?php
/**
 * Change the date format of the "Date of Donation" column in the Donations export.
 *
 * @param  mixed  $value The value to set.
 * @param  string $key   The key to set.
 * @param  array  $data  The set of data.
 * @return mixed
 */
function ed_charitable_format_date_in_donation_export( $value, $key, $data ) {
    if ( 'date' == $key ) {
        /**
         * You can use any valid date format.
         *
         * @see http://php.net/manual/en/function.date.php
         */
        $value = charitable_get_donation( $data['donation_id'] )->get_date( 'd/m/Y' );
    }

    return $value;
}

add_filter( 'charitable_export_data_key_value', 'ed_charitable_format_date_in_donation_export', 20, 3 );
