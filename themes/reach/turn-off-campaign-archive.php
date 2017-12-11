<?php

/**
 * Turn off the post type archive for campaigns.
 *
 * @param  array $post_type_args
 * @return array
 */
function reach_turn_off_campaign_archives( $post_type_args ) {
    $post_type_args['has_archive'] = false;
    return $post_type_args;
}

add_filter( 'charitable_campaign_post_type', 'reach_turn_off_campaign_archives', 11 );

