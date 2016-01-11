<?php 

/**
 * Change the "State" field into a "Province" field.
 *
 * @param   array[] $fields
 * @return  array[]
 */
function en_donation_form_change_state_to_province( $fields ) {
    $fields[ 'state' ][ 'label' ] = __( 'Province', 'your-namespace' );
    return $fields;
}

add_filter( 'charitable_donation_form_user_fields', 'en_donation_form_change_state_to_province' );