<?php
/**
 * Set campaigns to published after they are submitted.
 *
 * @param   array $submitted
 * @param   int $campaign_id
 */
function ed_auto_approve_campaigns( $submitted, $campaign_id ) {
    /**
     * Check whether the campaign is pending. Don't touch
     * campaigns that are being previewed or have already
     * been published.
     */
    if ( 'pending' == get_post_status( $campaign_id ) ) {

        wp_update_post( array(
            'ID' => $campaign_id,
            'post_status' => 'publish'
        ) );

    }
}

add_action( 'charitable_campaign_submission_save', 'ed_auto_approve_campaigns', 10, 2 );