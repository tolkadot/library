<?php 
/**
 * You may want to use a different donation receipt page for Offline
 * donations than your other donations.
 *
 * In the example below, just set $custom_page to the URL or permalink
 * of the page you would like donors to be redirected to after
 * donating offline.
 *
 * @param   string $url  The default donation receipt URL.
 * @param   array  $args Set of arguments, including the donation ID.
 * @return  string Return the donation receipt URL for this donation.
 */
function ed_charitable_set_custom_donation_receipt_page_for_offline( $url, $args ) {
    
    // Get the donation ID.
    $donation_id = isset( $args['donation_id'] ) ? $args['donation_id'] : get_the_ID();

    // If this was not an offline donation, return the default URL.
    if ( 'offline' != get_post_meta( $donation_id, 'donation_gateway', true ) ) {
        return $url;
    }

    // Set the custom page link. Replace 123 with the ID of your custom page, or add a
    // hard-coded link like https://yoursite.com/custom-page/
    $custom_page = get_permalink( 123 );
    
    return esc_url_raw( add_query_arg( array( 'donation_id' => $donation_id ), $custom_page ) );
}

add_filter( 'charitable_permalink_donation_receipt_page', 'ed_charitable_set_custom_donation_receipt_page_for_offline', 10, 2 );
