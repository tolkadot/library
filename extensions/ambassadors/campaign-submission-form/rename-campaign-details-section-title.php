<?php 
/**
 * Change the header of the "Campaign Details" section to something else. 
 *
 * In this case, we've changed it to "Team Details". 
 */
function ed_rename_campaign_details_section_title( $fields ) {
    $fields[ 'campaign_fields' ][ 'legend' ] = __( 'Team Details', 'your-namespace' );
    return $fields;
}

add_filter( 'charitable_campaign_submission_fields', 'ed_rename_campaign_details_section_title' );
