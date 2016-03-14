<?php

/**
 * Remove the user biography field from the frontend campaign submission form.
 */
function ed_remove_user_bio_field_from_campaign_submissions( $fields ) { 
    unset( $fields[ 'user_description' ] );
    return $fields;
}
add_filter( 'charitable_campaign_submission_user_fields', 'ed_remove_user_bio_field_from_campaign_submissions' );
