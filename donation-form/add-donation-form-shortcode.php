<?php

/**
 * Display a specific campaign's donation form using a shortcode.
 *
 * After adding this code snippet, you can include any donation form with the following shortcode:
 *
 * [charitable_donation_form campaign=123] // Replace 123 with the ID of your campaign.
 */
function ed_charitable_donation_form_shortcode( $args ) {
    if ( ! array_key_exists( 'campaign', $args ) ) {
        return '';
    }

    if ( Charitable::CAMPAIGN_POST_TYPE !== get_post_type( $args['campaign'] ) ) {
        return '';
    }

    ob_start();

    charitable_get_campaign( $args['campaign'] )->get_donation_form()->render();

    return ob_get_clean();
}
