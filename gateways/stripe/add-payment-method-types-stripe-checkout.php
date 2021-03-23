<?php
/**
 * Stripe Checkout currently only supports card payments, but you
 * can add support for additional payment methods with this code.
 *
 * @see https://stripe.com/docs/api/checkout/sessions/create#create_checkout_session-payment_method_types
 */
add_filter(
    'charitable_stripe_session_args',
    function( $args ) {
        $args['payment_method_types'] = array(
			'card',
			'ideal',
			'giropay',
		);

        return $args;
    }
);