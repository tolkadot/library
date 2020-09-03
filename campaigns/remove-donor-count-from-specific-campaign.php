<?php
/**
 * NOTE: This code snippet must be included in your theme's functions.php file,
 * or in a custom plugin. It will cause an error if you add it using a plugin
 * like Code Snippets.
 */

/**
 * Hide the campaign donor count from a specific campaign, using the campaign ID.
 *
 * @param   Charitable_Campaign $campaign
 */
function charitable_template_campaign_donor_count( $campaign ) {
	// Remove stats from campaigns with IDs of 6 and 22.
	$campaigns = [ 6, 22 ];

	if ( in_array( $campaign_id, $campaigns ) ) {
		return;
	}

	charitable_template( 'campaign/summary-donors.php', array( 'campaign' => $campaign ) );
	return true;
}
