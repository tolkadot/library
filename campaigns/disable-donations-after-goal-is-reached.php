<?php
/**
 * NOTE: This code snippet must be included in your theme's functions.php file,
 * or in a custom plugin. It will cause an error if you add it using a plugin
 * like Code Snippets.
 */

/**
 * This function disables donations to campaigns after they have reached
 * their goal.
 *
 * Note that this won't prevent the final donor - the one whose donation
 * tips the campaign over the goal - from donating *more* than is required
 * to reach the goal. It will prevent any donations being made after that
 * donation has beeen made (unless donations are refunded, cancelled, etc.).
 *
 * @param boolean             $can      Whether the campaign can receive donations.
 * @param Charitable_Campaign $campaign This instance of `Charitable_Campaign`.
 */
function ed_charitable_disable_donations_after_goal_is_reached( $can, Charitable_Campaign $campaign ) {
	/**
	 * If you would like to only do this for a specific campaign, uncomment the
	 * next three lines and change '123' to the ID of your campaign.
	 */
	// if ( 123 != $campaign->ID ) {
	//	return $can;
	// }

	/**
	 * Don't do anything for campaigns without a goal.
	 */
	if ( ! $campaign->has_goal() ) {
		return $can;
	}

	/**
	 * If the campaign has reached its goal, set $can to false.
	 */
	if ( $campaign->has_achieved_goal() ) {
		$can = false;
	}

	return $can;
}

add_filter( 'charitable_campaign_can_receive_donations', 'ed_charitable_disable_donations_after_goal_is_reached', 10, 2 );

/**
 * If a campaign can no longer receive donations because its goal has been
 * reached, you may not want to show the amount of time left on the campaign
 * page.
 *
 * NOTE: This function overrides the function of the same name in Charitable.
 *
 * @param  Charitable_Campaign $campaign The campaign object.
 * @return boolean     True if the template was displayed. False otherwise.
 */
if ( ! function_exists( 'charitable_template_campaign_time_left' ) ) {

	function charitable_template_campaign_time_left( $campaign ) {
		if ( $campaign->is_endless() ) {
			return false;
		}

		/**
		 * If the campaign has a goal and it has achieved that goal, show
		 * that instead of the time left.
		 */
		if ( $campaign->has_goal() && $campaign->has_achieved_goal() ) {
			?>
			<div class="campaign-time-left campaign-summary-item"><?php _e( 'This campaign has reached its goal.', 'ed-charitable' ); ?></div>
			<?php
		} else {
			charitable_template( 'campaign/summary-time-left.php', array( 'campaign' => $campaign ) );
		}

		return true;
	}
}
