<?php
/**
 * In this example, we add a new recurring donation length,
 * so recurring donations will finish automatically after
 * 36 months.
 */
add_filter( 'charitable_recurring_donation_ranges', function( $donation_ranges ) {
	$donation_ranges['month'][36] = '36 Months';
	return $donation_ranges;
} );