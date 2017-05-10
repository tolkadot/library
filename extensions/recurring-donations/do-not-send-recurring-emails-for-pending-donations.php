<?php
/**
 * Prevent recurring emails from getting sent for pending donations unless they are offline.
 *
 * NOTE: This snippet is only need if you are also using https://github.com/Charitable/library/blob/master/donations/add-pending-to-approved-statuses.php
 * to send emails for pending offline recurring donations. If you're not using that, you
 * do not need this snippet.
 *
 * @param   boolean             $ret
 * @param   Charitable_Donation $donation
 * @return  boolean
 */
function ed_charitable_do_not_send_recurring_emails_for_pending_donations( $ret, $donation ) {
    if ( ! $ret ) {
        return $ret;
    }

    if ( 'offline' == $donation->get_gateway() ) {
        return $ret;
    }

    return 'charitable-pending' != get_post_status( $donation->ID );
}

add_filter( 'charitable_send_recurring_donation_receipt', 'ed_charitable_do_not_send_recurring_emails_for_pending_donations', 10, 2 );
add_filter( 'charitable_send_admin_new_renewal_donation', 'ed_charitable_do_not_send_recurring_emails_for_pending_donations', 10, 2 );
add_filter( 'charitable_send_admin_new_recurring_donation', 'ed_charitable_do_not_send_recurring_emails_for_pending_donations', 10, 2 );