<?php 

/**
 * Set the descriptor to be displayed on donors' credit card records.
 *
 * @param   array               $charges
 * @param   Charitable_Donation $donation
 * @return  array
 */
function ed_charitable_set_stripe_statement_descriptor( $charges, $donation ) {

    foreach ( $charges as $key => $charge ) {

        /** 
         * The max length of the statement descriptor is 22 characters.
         *
         * @see     https://stripe.com/docs/api#create_charge-statement_descriptor
         */
        $charges[ $key ]['statement_descriptor'] = 'Custom';

    }

    return $charges;

}

add_filter( 'charitable_stripe_charge_args', 'ed_charitable_set_stripe_statement_descriptor', 10, 2 );