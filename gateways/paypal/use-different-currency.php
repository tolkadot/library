<?php
/**
 * This snippet shows how to use a different currency for PayPal donations.
 *
 * Bear in mind though that the totals shown on the site will not do any
 * currency conversions, so the total value of donations will not be correct
 * when you're counting both USD & another currency's donations. For example,
 * if your site currency is EUR and you have received 100 EUR + $100 USD, it
 * will show you have received 200 EUR, even though what you have received is
 * not the equivalent of 200 EUR.
 */
function ed_charitable_set_currency_arg( $args ) {
    $args['currency_code'] = 'USD';
    return $args;
}

add_filter( 'charitable_paypal_redirect_args', 'ed_charitable_set_currency_arg' );

function ed_charitable_set_currency_for_ipn() {
    $options = get_option( 'charitable_settings' );
    
    // Set the currency to the PayPal-only currency.
    $options['currency'] = 'USD';
    update_option( 'charitable_settings', $options );
    
    add_action( 'shutdown', 'ed_charitable_reset_currency_after_ipn' );
}

add_action( 'charitable_paypal_web_accept', 'ed_charitable_set_currency_for_ipn', 1 );

function ed_charitable_reset_currency_after_ipn() {
    $options = get_option( 'charitable_settings' );
    
    // Reset the currency to the original currency.
    $options['currency'] = 'EUR';
    update_option( 'charitable_settings', $options );
}
