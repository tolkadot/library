<?php

/**
 * Prevent users from creating a new campaign.
 *
 * @param   array $args
 * @return  array
 */
function ed_charitable_allow_one_campaign_per_user( $args ) {

    /* Don't stop people editing existing campaigns. */
    if ( get_query_var( 'campaign_id', false ) ) {
        return $args;
    }

    $user_id = get_current_user_id();

    if ( ! $user_id ) {
        return $args;
    }

    $count = count_user_posts( $user_id, 'campaign' );

    if ( $count > 0 ) {
        $args['hidden'] = true;
    }

    return $args;

}

add_filter( 'charitable_campaign_submission_form_args', 'ed_charitable_allow_one_campaign_per_user' );

/**
 * Display a message explaining that you're only allowed to create one campaign.
 *
 * @return  void
 */
function ed_charitable_show_one_campaign_per_user_notice() {
    echo '<p>' . __( 'You are not allowed to create any more campaigns. Only one campaign per user is permitted.', 'your-namespace' ) . '</p>';
}

add_action( 'charitable_submit_campaign_shortcode_hidden', 'ed_charitable_show_one_campaign_per_user_notice' );
