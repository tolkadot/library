<?php 
/**
 * Add the offline donation instructions to the donation form.
 *
 * @param   array              $fields  The default fields to display for the gateway.
 * @param   Charitable_Gateway $gateway The gateway object.
 * @return  array
 */
function ed_charitable_add_offline_instructions_to_donation_form( $fields, $gateway ) {
    if ( ! is_a( $gateway, 'Charitable_Gateway_Offline' ) ) {
        return $fields;
    }

    $fields['offline_instructions'] = array(
        'type'      => 'paragraph',
        'priority'  => 0, 
        'fullwidth' => true, 
        'content'   => $gateway->get_value( 'instructions' ),
    );

    return $fields;
}

add_filter( 'charitable_donation_form_gateway_fields', 'ed_charitable_add_offline_instructions_to_donation_form', 10, 2 );
