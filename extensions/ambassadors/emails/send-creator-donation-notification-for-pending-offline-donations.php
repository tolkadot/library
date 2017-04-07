<?php 
/**
 * Right after a donation is made, this sends the donation notification to 
 * the campaign creator if the donation is pending AND it was made in offline mode.
 *
 * @param   int $donation_id
 * @return  boolean
 */
function en_charitable_send_creator_donation_notification_for_pending_offline( $donation_id ) {
    /* Verify that the email is enabled. */
    if ( ! charitable_get_helper( 'emails' )->is_enabled_email( Charitable_Ambassadors_Email_Creator_Donation_Notification::get_email_id() ) ) {
        return false;
    }
    
    /* If the donation is not pending, stop here. */
    if ( 'charitable-pending' != get_post_status( $donation_id ) ) {
        return false;
    }

    /**
     * Since a single donation may include donations to multiple
     * campaigns, it is possible that multiple creator notifications
     * need to be sent.
     *
     * We group the campaign donations created by donor and send one
     * notification for each creator.
     */
    $donation = charitable_get_donation( $donation_id );
    $creators = array();

    foreach ( $donation->get_campaign_donations() as $campaign_donation ) {

        $creator_id = get_post_field( 'post_author', $campaign_donation->campaign_id );

        if ( ! isset( $creators[ $creator_id ] ) ) {
            $creators[ $creator_id ] = array();
        }

        $creators[ $creator_id ][] = $campaign_donation;

    }

    /**
     * Send an email to every creator who just received a donation.
     */
    foreach ( $creators as $creator_id => $campaign_donations ) {

        $email = new Charitable_Ambassadors_Email_Creator_Donation_Notification( array(
            'donation' => $donation,
            'creator' => new Charitable_User( $creator_id ),
            'campaign_donations' => $campaign_donations,
        ) );

        /**
         * Don't resend the email.
         */
        if ( $email->is_sent_already( $donation_id ) ) {
            return false;
        }

        $sent = $email->send();

        /**
         * Log that the email was sent.
         */
        if ( apply_filters( 'charitable_log_email_send', true, self::get_email_id(), $email ) ) {
            $email->log( $donation_id, $sent );
        }
    }
    
    return true;
}

add_action( 'charitable_after_save_donation', 'en_charitable_send_creator_donation_notification_for_pending_offline' );