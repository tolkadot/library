<?php 
/**
 * Remove "categories" from the frontend campaign submission form.
 */
function ed_remove_categories_from_campaign_submissions( $fields ) {
    unset( $fields[ 'campaign_category' ] );
    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_remove_categories_from_campaign_submissions' );