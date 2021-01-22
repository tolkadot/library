<?php
/**
 * Disable unwanted recurring donation periods.
 */
function ed_charitable_disable_recurring_donation_periods( $periods ) {
	unset(
		$periods['week'],
		$periods['quarter'],
		$periods['semiannual']
	);
	return $periods;
}

add_filter( 'charitable_recurring_periods', 'ed_charitable_disable_recurring_donation_periods' );
add_filter( 'charitable_recurring_period_strings', 'ed_charitable_disable_recurring_donation_periods' );
add_filter( 'charitable_recurring_periods_adverbs', 'ed_charitable_disable_recurring_donation_periods' );