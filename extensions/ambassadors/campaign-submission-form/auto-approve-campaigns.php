<?php 
/**
 * Automatically set campaigns as published when they are submitted. 
 */
function ed_auto_approve_campaigns( $status ) {
    return 'publish';
}

add_filter( 'charitable_campaign_submission_initial_status', 'ed_auto_approve_campaigns' );