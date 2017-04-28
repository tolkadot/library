<?php 
/**
 * Automatically set the donation amount and recurring
 * period for donations.
 *
 * @param   array $fields
 * @return  array
 */
function ed_charitable_set_donation_amount( $fields ) {
    unset( $fields['donation_fields'] );

    // The amount you would like to donate.
    $amount = 5;

    // The recurring donation period.
    $period = 'week';

    $fields['donation_amount'] = array(
        'type'     => 'hidden',
        'priority' => 0.1,
        'value'    => $amount,         
    );
    $fields['recurring_donation'] = array(
        'type'     => 'hidden',
        'priority' => 0.2,
        'value'    => $period,        
    );
    return $fields;
}

add_filter( 'charitable_donation_form_fields', 'ed_charitable_set_donation_amount', 20 );