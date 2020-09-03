<?php
/**
 * NOTE: This code snippet must be included in your theme's functions.php file,
 * or in a custom plugin. It will cause an error if you add it using a plugin
 * like Code Snippets.
 */

/**
 * Hide the campaign summary stats from a specific campaign, using the campaign ID.
 *
 * @param   Charitable_Campaign $campaign
 */
function charitable_template_campaign_summary( $campaign ) {

	$campaign_id = 325; // Replace with the ID of your campaign.

	if ( $campaign_id == $campaign->ID ) {

		// If you still want to show a Donate button, uncomment the line below.
		// charitable_template_donate_button( $campaign );
		return;
	}

	charitable_template( 'campaign/summary.php', array( 'campaign' => $campaign ) );
}
