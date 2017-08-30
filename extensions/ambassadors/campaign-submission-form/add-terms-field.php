<?php 
/**
 * Add a terms and conditions section to the campaign form.
 *
 * @param  array                                $fields The array of fields in the form.
 * @param  Charitable_Ambassadors_Campaign_Form $form   The form object.
 * @return array
 */
function ed_charitable_add_terms_and_conditions_to_campaign_form( $fields, $form ) {
    $fields['terms_fields'] = array(
        'legend'   => __( 'Terms and Conditions' ),
        'type'     => 'fieldset',
        'fields'   => array(
            'terms' => array(
                'type'      => 'paragraph',
                'priority'  => 1,
                'fullwidth' => true,
                'content'   => __( 'Write your terms and conditions here.', 'ed-charitable' ),
            ),
            'terms_agreement' => array(
                'label'     => __( 'Yes, I agree to the terms and conditions.', 'ed-charitable' ),
                'type'      => 'checkbox', 
                'value'     => 1,
                'priority'  => 2,
                'required'  => true,
                'checked'   => $form->get_campaign_value( 'terms' ),
                'data_type' => 'meta',
            ),
        ),
        'priority' => 100,
        'page'     => 'campaign_details',
    );

    return $fields;
}

add_action( 'charitable_campaign_submission_fields', 'ed_charitable_add_terms_and_conditions_to_campaign_form', 10, 2 );