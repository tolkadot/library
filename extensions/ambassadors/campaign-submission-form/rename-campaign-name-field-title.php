<?php 
/**
 * Change the label of the "Campaign Name" field to something else. 
 *
 * In this case, we've changed it to "Team Name". 
 */
function ed_rename_campaign_name_field_title( $fields ) {
    $fields[ 'post_title' ][ 'label' ] = __( 'Team Name', 'your-namespace' );
    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_rename_campaign_name_field_title' );
