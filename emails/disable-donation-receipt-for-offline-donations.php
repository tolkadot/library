<?php
/**
 * Disable the donation receipt email for offline donations.
 */
add_filter(
    'charitable_send_donation_receipt',
    /**
     * Our callback function.
     *
     * @param  boolean             $send_email Whether to send the email.
     * @param  Charitable_Donation $donation   The donation object.
     * @return boolean Whether to send the email.
     */
    function( $send_email, Charitable_Donation $donation ) {
        if ( ! $send_email ) {
            return false;
        }

        if ( 'offline' == $donation->get_gateway() ) {
            return false;
        }

        return $send_email;
    },
    10,
    2
);
