<?php
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