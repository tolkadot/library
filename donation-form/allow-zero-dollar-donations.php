<?php
/**
 * Allow people to "donate" $0.
 */
function ed_charitable_set_minimum_donation_amount() {
    return 0;
}
add_filter( 'charitable_minimum_donation_amount', 'ed_charitable_set_minimum_donation_amount' );

/**
 * You need to specifically enable $0 donations.
 */
add_filter( 'charitable_permit_0_donation', '__return_true' );
