<?php 
/**
 * Make all address fields required.
 *
 * @param   array[] $fields
 * @return  array[]
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