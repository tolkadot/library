<?php 
/**
 * Make the "Pending" status an approved statuses, so that it is counted in the campaign funds raised.
 */
function ed_add_pending_to_approved_statuses( $statuses ) {
    $statuses[] = 'charitable-pending';
    return $statuses;
}

add_filter( 'charitable_approval_donation_statuses', 'ed_add_pending_to_approved_statuses' );