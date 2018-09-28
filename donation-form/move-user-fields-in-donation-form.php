<?php 
/**
 * In this example we move the user fields section (the "Your Details" bit) to 
 * appear below the payment fields. 
 */
function ed_charitable_move_user_fields_in_donation_form( $fields ) {
	if ( ! array_key_exists( 'details_fields', $fields ) ) {
		$fields['user_fields']['priority'] = 80;
	} else {
		$fields['details_fields']['priority'] = 80;
	}
    
    return $fields;
}

add_filter( 'charitable_donation_form_fields', 'ed_charitable_move_user_fields_in_donation_form' );
