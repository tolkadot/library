<?php
/**
 * Set the minimum donation amount required.
 *
 * This function is called when the donation amount is validated, so it needs
 * to return either true or false.
 *
 * Note that as of Charitable 1.5, there is a better way to do this:
 *
 * @see https://github.com/Charitable/library/blob/master/donation-form/set-minimum-donation-amount.php
 */
function ed_set_minimum_donation_amount( $valid, Charitable_Donation_Form_Interface $donation_form ) {

    /* Replace 2 with your minimum donation amount. */
    $minimum = 2;

    if ( $donation_form::get_donation_amount() < $minimum ) {

        charitable_get_notices()->add_error( sprintf(
            __( 'You must donate more than %s.', 'charitable' ),
            charitable_format_money( $minimum )
        ) );

        $valid = false;

    }

    return $valid;

}

add_filter( 'charitable_validate_donation_form_submission_amount_check', 'ed_set_minimum_donation_amount', 10, 2 );
