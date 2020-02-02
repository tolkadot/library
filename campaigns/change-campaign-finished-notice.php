<?php
/**
 * Change the notice shown for campaigns when they are finished.
 *
 * This notice is only shown in certain themes (Reach, for example).
 */
add_filter(
	'charitable_campaign_finished_notice',
	function( $message, Charitable_Campaign $campaign ) {
		/* If the campaign is ongoing, don't change the message. */
		if ( ! $campaign->has_ended() ) {
			return $message;
		}

		if ( ! $campaign->has_goal() ) {
			$message = __( 'This campaign ended %s ago', 'charitable' );
		} elseif ( $campaign->has_achieved_goal() ) {
			$message = __( 'This campaign successfully reached its funding goal and ended %s ago', 'charitable' );
		} else {
			$message = __( 'This campaign failed to reach its funding goal %s ago', 'charitable' );
		}

		return sprintf( $message, '<span class="time-ago">' . human_time_diff( $campaign->get_end_time() ) . '</span>' );
	},
	10,
	2
);
