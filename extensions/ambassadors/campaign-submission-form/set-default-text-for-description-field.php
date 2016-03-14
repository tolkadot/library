<?php

/**
 * Set default text for the Full Description field in the frontend campaign submission form.
 */
function ed_add_default_description_text_for_campaign_submissions( $fields ) {
    if ( empty( $fields[ 'post_content' ][ 'value' ] ) ) {
        $fields[ 'post_content' ][ 'value' ] = __( 'Default text', 'your-namespace' );
    }
    
    return $fields;
}
add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_add_default_description_text_for_campaign_submissions' );