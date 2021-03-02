<?php
/**
 * Sometimes, it can be useful to do something special for campaigns that
 * have been fully funded.
 *
 * In this example, when a campaign receives a donation and is fully funded,
 * two things happen:
 *
 * 1. It gets given the "Funded" tag. This allows filtering by tag, for example
 *    using the [campaigns] shortcode.
 * 2. It has its end date set to 12AM today. This prevents any further donations
 *    to the campaign.
 */
add_action( 'charitable_post_insert_campaign_donation', function( $campaign_donation_id, $data ) {
	$campaign = charitable_get_campaign( $data['campaign_id'] );

	/* Skip campaigns that doesn't have a goal or has not reached its goal. */
	if ( ! $campaign->has_goal() || ! $campaign->has_achieved_goal() ) {
		return;
	}

	/* Do something for campaigns that have reached their goal. */

	/* Example 1: Add a "funded" tag. */
	wp_set_object_terms( $data['campaign_id'], 'funded', 'campaign_tag' );

	/* Example 2: Change the campaign end date to today. */
	update_post_meta( $data['campaign_id'], '_campaign_end_date', date( 'Y-m-d 00:00:00' ) );
}, 10, 2 );
