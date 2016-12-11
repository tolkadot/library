<?php

/**
 * Register the new image size.
 *
 * @see     https://developer.wordpress.org/reference/functions/add_image_size/
 */
function ed_charitable_add_campaign_image_size() {
    add_image_size(
        'campaign-thumbnail', // name
        300, // width
        300, // height
        true // crop
    );
}

add_action( 'after_setup_theme', 'ed_charitable_add_campaign_image_size' );

/**
 * Set the campaign loop to use the 'campaign-thumbnail' image size we registered.
 *
 * @param   string $size
 * @return  string
 */
function ed_charitable_set_campaign_loop_image_size( $size ) {
    return 'campaign-thumbnail';
}

add_filter( 'charitable_campaign_loop_thumbnail_size', 'ed_charitable_set_campaign_loop_image_size' );
