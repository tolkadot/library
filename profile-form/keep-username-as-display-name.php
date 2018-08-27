<?php

/**
 * When people update their profile, keep their display name set to
 * be the same as their login name (username).
 */
function ed_charitable_keep_original_display_name( $values ) {
    $values['display_name'] = wp_get_current_user()->user_login;
    return $values;
}

add_filter( 'charitable_profile_update_values', 'ed_charitable_keep_original_display_name' );
add_filter( 'charitable_campaign_submission_user_data', 'ed_charitable_keep_original_display_name' );