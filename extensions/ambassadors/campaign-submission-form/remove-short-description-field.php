<?php 

/**
 * Remove "short description" field from the frontend campaign submission form.
 */
function ed_remove_short_description_from_campaign_submissions( $fields ) {
    unset( $fields[ 'description' ] );
    return $fields;
}
add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_remove_short_description_from_campaign_submissions' );