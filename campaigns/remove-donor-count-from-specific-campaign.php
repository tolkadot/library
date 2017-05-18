<?php 
/**
 * Hide the campaign donor count from a specific campaign, using the campaign ID.
 *
 * @param   Charitable_Campaign $campaign
 */
function charitable_template_campaign_donor_count( $campaign ) {

    $campaign_id = 6; // Replace with the ID of your campaign.
    
    if ( $campaign_id == $campaign->ID ) {
        return;
    }

    charitable_template( 'campaign/summary-donors.php', array( 'campaign' => $campaign ) );
    return true;
}