<?php
/**
 * Set the maximum donation amount required.
 *
 * This function is called when the donation amount is validated, so it needs
 * to return either true or false.
 */
function ed_set_maximum_donation_amount( $valid, Charitable_Donation_Form_Interface $donation_form ) {

    /* Replace 5000 with your maximum donation amount. */
    $maximum = 5000;

    if ( $donation_form::get_donation_amount() > $maximum ) {

        charitable_get_notices()->add_error( sprintf(
            __( 'We cannot accept donations of more than %s.', 'charitable' ),
            charitable_format_money( $maximum )
        ) );

        $valid = false;

    }

    return $valid;

}

add_filter( 'charitable_validate_donation_form_submission_amount_check', 'ed_set_maximum_donation_amount', 10, 2 );