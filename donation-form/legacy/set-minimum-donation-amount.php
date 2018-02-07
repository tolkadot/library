<?php
/**
 * Set the minimum donation amount required.
 *
 * This requires Charitable 1.5+. If you are using a previous version:
 *
 * @see https://github.com/Charitable/library/blob/master/donation-form/legacy/set-minimum-donation-amount.php
 */
function ed_charitable_set_minimum_donation_amount() {
    return 2;
}

add_filter( 'charitable_minimum_donation_amount', 'ed_charitable_set_minimum_donation_amount' );
