<?php
/**
 * Do not send emails for renewal donations.
 *
 * @param  boolean             $send     Whether to send the email.
 * @param  Charitable_Donation $donation The donation the email is being sent for.
 * @return boolean
 */
function ed_charitable_do_not_send_renewal_donation_emails( $send, $donation ) {
	/**
	 * If we have already decided not to send for some other
	 * reason, no need to do anything else.
	 * */
	if ( ! $send ) {
		return $send;
	}

	$recurring = $donation->get_donation_plan();

	/**
	 * Returns true if this is not a recurring donation or
	 * if this is the first donation of a recurring donation.
	 */
	return false === ( $recurring && get_post_meta( $donation->ID, '_renewal_donation', true ) );
}

add_filter( 'charitable_send_donation_receipt', 'ed_charitable_do_not_send_renewal_donation_emails', 10, 2 );
add_filter( 'charitable_send_new_donation', 'ed_charitable_do_not_send_renewal_donation_emails', 10, 2 );
add_filter( 'charitable_send_offline_donation_notification', 'ed_charitable_do_not_send_renewal_donation_emails', 10, 2 );
add_filter( 'charitable_send_offline_donation_receipt', 'ed_charitable_do_not_send_renewal_donation_emails', 10, 2 );
add_filter( 'charitable_send_recurring_donation_receipt', 'ed_charitable_do_not_send_renewal_donation_emails', 10, 2 );