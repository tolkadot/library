<?php
/**
 * Modify the description of the payment as it is shown in PayFast.
 *
 * @param  array               $args
 * @param  Charitable_Donation $donation
 * @return array
 */
add_filter(
	'charitable_payfast_redirect_args',
	function( $args, Charitable_Donation $donation ) {
		$args['item_name'] = 'Donation to ' . $donation->get_campaigns_donated_to();
		return $args;
	},
	10,
	2
);