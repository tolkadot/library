<?php
/**
 * By default, the Offline payment method supports recurring donations,
 * though it is up to the donor to complete the setup of their
 * recurring donation.
 *
 * If you would prefer to not show Offline payments
 * as an option when a donor is making a recurring donation, you can use
 * the code below.
 *
 * @param  boolean            $supported Whether a particular feature is supported.
 * @param  string             $feature   The feature.
 * @param  Charitable_Gateway $gateway   A `Charitable_Gateway` object.
 * @return boolean
 */
add_filter('charitable_payment_gateway_supports', function( $supported, $feature, $gateway ) {
	if ( 'offline' === $gateway::ID && 'recurring' === $feature ) {
		$supported = false;
	}

	return $supported;
}, 10, 3 );