<?php
/**
 * Set the default donation amount for all campaigns.
 *
 * @see https://github.com/Charitable/library/blob/master/donation-form/set-default-donation-amount-per-campaign.php
 *
 * @param  float|int $amount The amount to be filtered. $0 by default.
 * @return float|int
 */
function ed_charitable_set_default_donation_amount( $amount ) {
    // Return a default donation amount of $15.
	return 15;
}

add_filter( 'charitable_default_donation_amount', 'ed_charitable_set_default_donation_amount' );
