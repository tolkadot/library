<?php 
/**
 * Add CC/BCC headers to Charitable emails.
 *
 * @param  string           $headers The default email headers.
 * @param  Charitable_Email $email   The email object.
 * @return string
 */
function ed_charitable_add_email_headers( $headers, $email ) {

    /**
     * If you would only like this to apply to a particular email,
     * uncomment the following and replace 'donation_receipt' with the ID of the
     * email you want.
     *
     * These are the emails and their IDs in the Charitable & extensions:
     *
     * donation_receipt              - Donor's donation receipt.
     * new_donation                  - Admin donation notification.
     * campaign_end                  - Admin notification of a campaign ending.
     * password_reset                - Password reset email.
     * creator_campaign_ending       - Creator notification of a campaign ending [Ambassadors].
     * creator_campaign_submission   - Creator notification after campaign submission [Ambassadors].
     * creator_donation_notification - Creator notification of a donation received [Ambassadors].
     * new_campaign                  - Admin notification of a campaign submission [Ambassadors].
     * admin_new_recurring_donation  - Admin notification of a new recurring donation / subscription [Recurring].
     * admin_new_renewal_donation    - Admin notification of a renewal donation for an ongoing subscription [Recurring].
     * recurring_donation_receipt    - Donor receipt for a subscription donation [Recurring].
     */
    // if ( 'donation_receipt' != $email::get_email_id() ) {
    //     return $headers;
    // }

    /* Replace name@example.com with the email you would like emails to be CC'ed to */
    $headers .= "Cc: cc@example.com\r\n";

    /* Or for BCC */
    $headers .= "Bcc: bcc@example.com\r\n";

    return $headers;
}

add_filter( 'charitable_email_headers', 'ed_charitable_add_email_headers', 10, 2 );
