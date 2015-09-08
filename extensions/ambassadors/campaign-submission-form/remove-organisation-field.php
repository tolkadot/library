<?php 
/**
 * Remove "categories" from the frontend campaign submission form.
 */
function ed_remove_organisation_from_campaign_submissions( $fields ) {
    unset( $fields[ 'organisation' ] );
    return $fields;
}

add_filter( 'charitable_campaign_submission_user_fields', 'ed_remove_organisation_from_campaign_submissions' );