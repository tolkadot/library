<?php
/**
 * Charitable EDD includes an email tag, {campaign_donations_list}, which
 * displays a list of campaigns that have received donations through the
 * purchase, together with the amount.
 *
 * In this example, the campaign parent is also included.
 */
add_filter( 'charitable_edd_campaign_donations_list_email_tag',
	function( $output, $payment_id, $campaigns ) {
		$output = '';

		foreach ( $campaigns as $campaign ) {
			$campaign_name = $campaign->campaign_name;
			$parent_id     = wp_get_post_parent_id( $campaign->campaign_id );

			if ( 0 !== $parent_id ) {
				$campaign_name .= ' (Parent Campaign: ' . get_the_title( $parent_id ) . ')';
			}

			$output .= $campaign_name . ': ' . charitable_format_money( $campaign->amount ) . PHP_EOL;
		}

		return $output;
	},
	10,
	3
);