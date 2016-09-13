<?php 

/**
 * In this example, we make a simple tweak to the PayPal payment process
 * to collect shipping addresses in PayPal. 
 *
 * If the user fills out their shipping address in the Charitable donation form,
 * these values should be passed along to PayPal so they won't have to re-enter
 * them.
 *
 * @param   array $args
 * @return  array
 */
function ed_charitable_enable_shipping_in_paypal( $args ) {
    $args['no_shipping'] = 0;
    return $args;
}

add_filter( 'charitable_paypal_redirect_args', 'ed_charitable_enable_shipping_in_paypal' );
