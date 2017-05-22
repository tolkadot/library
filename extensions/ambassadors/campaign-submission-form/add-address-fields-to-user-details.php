<?php 
/**
 * This function adds address fields to the campaign submission form.
 *
 * @param   array                                $fields
 * @param   Charitable_Ambassadors_Campaign_Form $form
 * @return  array
 */
function ed_charitable_add_address_fields_to_campaign_form( $fields, $form ) {

    $fields['address'] = array(
        'label'     => __( 'Address', 'charitable' ),
        'type'      => 'text',
        'priority'  => 47,
        'required'  => false,
        'value'     => $form->get_user_value( 'donor_address' ),
    );

    $fields['address_2'] = array(
        'label'     => __( 'Address 2', 'charitable' ),
        'type'      => 'text',
        'priority'  => 47.5,
        'required'  => false,
        'value'     => $form->get_user_value( 'donor_address_2' ),
    );

    $fields['postcode'] = array(
        'label'     => __( 'Postcode / ZIP code', 'charitable' ),
        'type'      => 'text',
        'priority'  => 51,
        'required'  => false,
        'value'     => $form->get_user_value( 'donor_postcode' ),
    );

    return $fields;
}

add_filter( 'charitable_campaign_submission_user_fields' , 'ed_charitable_add_address_fields_to_campaign_form', 10, 2 ); 
