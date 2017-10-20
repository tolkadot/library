<?php
/**
 * Prevent the donation receipt from loading in the user
 * dashboard page.
 *
 * @param  boolean $ret Whether to load the page in the uer dashboard.
 * @return boolean
 */
function ed_charitable_load_receipt_in_regular_page( $ret ) {
    if ( charitable_is_page( 'donation_receipt_page' ) ) {
        $ret = false;
    }

    return $ret;
}

add_filter( 'charitable_is_in_user_dashboard', 'ed_charitable_load_receipt_in_regular_page', 20 );