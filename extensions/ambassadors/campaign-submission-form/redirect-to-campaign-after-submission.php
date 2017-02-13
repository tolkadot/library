<?php 

/**
 * Redirect to the newly created campaign after submission.
 *
 * @param   string $url
 * @param   array  $args
 * @return  string
 */
function ed_charitable_redirect_campaign_submission_to_campaign( $url, $args = array() ) {

    if ( ! array_key_exists( 'campaign_id', $args ) ) {
        return $url;
    }

    return get_permalink( $args['campaign_id'] );

}

add_filter( 'charitable_permalink_campaign_submission_success_page', 'ed_charitable_redirect_campaign_submission_to_campaign', 10, 2 );
