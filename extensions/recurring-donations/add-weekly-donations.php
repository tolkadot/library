<?php
/**
 * In this example, we add support for weekly donations.
 *
 * Note that this has currently only been tested with Stripe.
 */
add_filter(
	'charitable_recurring_periods',
	function( $periods, $number ) {
		$periods['week'] = sprintf( _n( 'week', '%s weeks', $number, 'ed-custom-code' ), $number );
		return $periods;
	},
    10,
    2
);

add_filter(
	'charitable_recurring_periods_adverbs',
	function( $adverbs ) {
		$adverbs['week'] = __( 'weekly', 'ed-custom-code' );
		return $adverbs;
	}
);