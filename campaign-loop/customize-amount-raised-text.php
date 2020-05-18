<?php
/**
 * In this example, we change how the "X donated of Y goal" text appears.
 *
 * @param string              $summary  The summary.
 * @param Charitable_Campaign $campaign This campaign object.
 * @param float               $amount   The amount donated.
 * @param int                 $goal     The campaign goal.
 */
add_filter(
	'charitable_donation_summary',
	function( $summary, $campaign, $amount, $goal ) {
		$currency_helper = charitable_get_currency_helper();

		if ( $goal ) {
			$summary = sprintf(
				'%1$s pledged of %2$s goal',
				'<span class="amount">' . $currency_helper->get_monetary_amount( $amount ) . '</span>',
				'<span class="goal-amount">' . $currency_helper->get_monetary_amount( $goal ) . '</span>'
			);
		} else {
			$summary = sprintf(
				'%s pledged',
				'<span class="amount">' . $currency_helper->get_monetary_amount( $amount ) . '</span>'
			);
		}

		return $summary;
	},
	10,
	4
);
