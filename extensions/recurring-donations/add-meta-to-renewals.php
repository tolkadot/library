<?php
/**
 * In this snippet, some donation meta that is recorded for the initial recurring
 * donation is added to the meta for any renewals for that recurring donation.
 */
add_filter(
	'charitable_recurring_renewal_donation_args',
	function( $args, $recurring_donation ) {
		$args['meta']['donation_reason'] = $recurring_donation->get( 'donation_reason' );
		return $args;
	},
	10,
	2
);