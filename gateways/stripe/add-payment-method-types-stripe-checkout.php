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
        if ( ! isset( $args['subscription_data'] ) ) {
			$args['payment_method_types'][] = 'ideal';
            $args['payment_method_types'][] = 'giropay';

			if ( isset( $args['payment_intent_data']['setup_future_usage'] ) ) {
				unset( $args['payment_intent_data']['setup_future_usage'] );
			}
		}

        return $args;
    }
);