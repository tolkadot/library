<?php 
/**
 * Remove campaign length field and add an end date field instead.
 */
function ed_charitable_replace_campaign_length_with_end_date_field( $fields, $form ) {    
    unset( $fields['length'] );

    $fields['end_date'] = array(
        'label'     => __( 'End Date', 'ed-charitable' ), 
        'type'      => 'datepicker',
        'priority'  => 8, 
        'required'  => true, 
        'data_type' => 'meta',
        'editable'  => false,
    );

    if ( $form->get_campaign() ) {
        $fields['end_date']['value'] = $form->get_campaign()->get_end_date();
    }    

    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_replace_campaign_length_with_end_date_field', 10, 2 );
