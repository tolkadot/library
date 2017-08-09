<?php
/**
 * Display the actual gateway used in EDD for Easy Digital Download donations.
 *
 * @param  string              $label    The default label. This will be EDD for any EDD donations currently.
 * @param  Charitable_Donation $donation The donation object.
 * @return string
 */
function ed_charitable_set_gateway_label_for_edd_donations( $label, Charitable_Donation $donation ) {
    if ( 'EDD' != $label ) {
        return $label; 
    }
    
    $payment_id = Charitable_EDD_Payment::get_payment_for_donation( $donation->ID );
    
    return sprintf( '%s (%s)', edd_get_gateway_checkout_label( edd_get_payment_gateway( $payment_id ) ), 'EDD' );
}

add_filter( 'charitable_donation_gateway_label', 'ed_charitable_set_gateway_label_for_edd_donations', 20, 2 );
