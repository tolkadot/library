<?php 
/**
 * Right after a donation is made, this sends the donation receipt to 
 * the donor if the donation is pending AND it was made in offline mode.
 *
 * @param   int $donation_id
 * @return  boolean
 */
function en_send_donation_receipt_for_pending_offline( $donation_id ) {
    /* Verify that the email is enabled. */
    if ( ! charitable_get_helper( 'emails' )->is_enabled_email( Charitable_Email_Donation_Receipt::get_email_id() ) ) {
        return false;
    }
    
    /* If the donation is not pending, stop here. */
    if ( 'charitable-pending' != get_post_status( $donation_id ) ) {
        return false;
    }

    /* If the donation was not made with the offline payment option, stop here. */
    if ( 'offline' != get_post_meta( $donation_id, 'donation_gateway', true ) ) {
        return false;
    }

    /* All three of those checks passed, so proceed with sending the email. */
    $email = new Charitable_Email_Donation_Receipt( array( 
        'donation' => new Charitable_Donation( $donation_id ) 
    ) );

    /* Don't resend the email. */
    if ( $email->is_sent_already( $donation_id ) ) {
        return false;
    }

    $sent = $email->send();

    /* Log that the email was sent. */
    if ( apply_filters( 'charitable_log_email_send', true, Charitable_Email_Donation_Receipt::get_email_id(), $email ) ) {
        $email->log( $donation_id, $sent );
    }

    return true;
}

add_action( 'charitable_after_save_donation', 'en_send_donation_receipt_for_pending_offline' );