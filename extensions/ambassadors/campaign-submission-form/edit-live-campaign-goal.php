<?php 
/**
 * Allow campaign creators to edit their campaign goal after it is live.
 */
function ed_edit_live_campaign_goal( $fields ) {
    $fields[ 'goal' ][ 'editable' ] = true;
    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_edit_live_campaign_goal' );