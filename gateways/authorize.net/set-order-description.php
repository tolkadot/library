<?php
/**
 * By default the order description will say "Donation to X",
 * where X is the campaign that received the donation. To customize
 * this, you can use the sample code below.
 *
 * @param  string                       $description The description.
 * @param  Charitable_Abstract_Donation $donation    Donation object.
 * @return string
 */
add_filter(
	'charitable_authorize_net_order_description',
	function( $description, Charitable_Abstract_Donation $donation ) {
		return 'My Custom Description';
	},
	10,
	2
);
