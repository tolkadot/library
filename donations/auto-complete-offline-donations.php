<?php

/**
 * Automatically mark all offline donations as Paid.
 *
 * @param   boolean $return
 * @param   int     $donation_id
 * @return  boolean
 */
function ed_auto_complete_offline_donation( $return, $donation_id ) {
	charitable_get_donation( $donation_id )->update_status( 'charitable-completed' );
	return $return;
}

add_filter( 'charitable_process_donation_offline', 'ed_auto_complete_offline_donation', 10, 2 );
