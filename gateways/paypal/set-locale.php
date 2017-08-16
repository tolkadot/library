<?php 
/**
 * Set the locale to be used in PayPal for the donation.
 *
 * @param  array $args All the arguments to be passed to PayPal.
 * @return array
 */
function ed_charitable_set_paypal_locale( $args ) {
    /**
     * Find a list of supported locale codes at https://developer.paypal.com/docs/classic/api/locale_codes/#supported-locale-codes
     */
    $args['lc'] = 'NL';
    return $args;
}

add_filter( 'charitable_paypal_redirect_args', 'ed_charitable_set_paypal_locale' );
