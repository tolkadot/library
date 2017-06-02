<?php 
/**
 * Set the item name to be displayed in PayPal for the donation.
 *
 * @param   array                         $args        All the arguments to be passed to PayPal.
 * @param   int                           $donation_id The donation ID.
 * @param   Charitable_Donation_Processor $processor   The donation processor object.
 * @return  array
 */
function ed_charitable_set_paypal_item_name( $args, $donation_id, $processor ) {
    $args['item_name'] = 'Your Custom Item Name';
    return $args;
}

add_filter( 'charitable_paypal_redirect_args', 'ed_charitable_set_paypal_item_name', 10, 3 );
