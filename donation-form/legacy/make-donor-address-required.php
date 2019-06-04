<?php
/**
 * Make all address fields required.
 *
 * As of Charitable 1.6 there is a better way achieving this. See:
 *
 * @see https://github.com/Charitable/library/blob/master/donation-form/make-donor-address-required.php
 *
 * @param  array[] $fields
 * @return array[]
 */
function ed_make_donor_address_required( $fields ) {
    /**
     * These are the fields that we will make required.
     */
    $required_fields = array(
        'address',
        // 'address_2',
        'city',
        'state',
        'postcode',
        'country',
        'phone'
    );

    foreach ( $required_fields as $key ) {

        $fields[ $key ][ 'required' ] = true;

    }

    return $fields;
}

add_filter( 'charitable_donation_form_user_fields', 'ed_make_donor_address_required' );