<?php
/**
 * This function adds a custom select field to the campaign submission form.
 *
 * @param  array                                $fields
 * @param  Charitable_Ambassadors_Campaign_Form $form
 * @return array
 */
function ed_charitable_add_campaign_form_text_field( $fields, $form ) {

    /**
     * Add the field to the array of fields.
     */
    $fields['custom_text_field'] = array(
        'priority'  => 1, // Adjust this to change where the field is inserted.
        'data_type' => 'meta',
        'label'     => 'Custom Text Field',
        'required'  => true,
        'type'      => 'text',
        'value'     => $form->get_campaign_value( 'custom_text_field' ),
    );

     return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields' , 'ed_charitable_add_campaign_form_text_field', 10, 2 );
