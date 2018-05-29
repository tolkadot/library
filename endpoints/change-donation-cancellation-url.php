<?php
/**
 * Change the URL that donors are returned to when they cancel their donation.
 *
 * @param  string $url  The default donation cancellation URL.
 * @param  array  $args Mixed arguments.
 * @return string
 */
function ed_charitable_set_donation_cancellation_url( $url, $args ) {
    /* A donation ID must be provided. */
    if ( ! array_key_exists( 'donation_id', $args ) ) {
        return $url;
    }

    return esc_url_raw( add_query_arg( array(
        'donation_id' => $args['donation_id'],
        'cancel'      => true,
    ), 'http://charitable.local/cancel/' ) );
}

add_filter( 'charitable_permalink_donation_cancellation_page', 'ed_charitable_set_donation_cancellation_url', 10, 2 );

/**
 * Check whether this is the donation cancellation page.
 *
 * @return boolean
 */
function ed_charitable_is_donation_cancellation_page() {
    global $wp_query;

    return array_key_exists( 'donation_id', $wp_query->query_vars )
        && array_key_exists( 'cancel', $wp_query->query_vars )
        && $wp_query->query_vars['cancel'];
}

add_filter( 'charitable_is_page_donation_cancellation_page', 'ed_charitable_is_donation_cancellation_page', 10, 2 );
