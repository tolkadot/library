<?php
/**
 * Customize the default donation amount on a per campaign basis.
 *
 * @see https://github.com/Charitable/library/blob/master/donation-form/set-default-donation-amount.php
 *
 * @param  float|int           $amount   The amount to be filtered. $0 by default.
 * @param  Charitable_Campaign $campaign The instance of `Charitable_Campaign`.
 * @return float|int
 */
function ed_charitable_set_default_donation_amount_per_campaign( $amount, Charitable_Campaign $campaign ) {
	switch ( $campaign->ID ) {
		// Default amount for campaign with ID #111
		case 111:
			$amount = 25;
			break;
	
		// Default amount for campaign with ID #222
		case 222:
			$amount = 50;
			break;

		// Default amount for campaign with ID #333
		case 333:
			$amount = 75;
			break;

		// The default amount for all other campaigns.
		default:
			$amount = 15;
	}
	
	return $amount;
}

add_filter( 'charitable_default_donation_amount', 'ed_charitable_set_default_donation_amount_per_campaign', 10, 2 );
