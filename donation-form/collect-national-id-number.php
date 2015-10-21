<?php 
/**
 * Collect the donor's National ID # in the donation form.
 *
 * @param   array[] $fields
 * @param   Charitable_Donation_Form $form
 * @return  array[]
 */
function ed_collect_national_id_number( $fields, Charitable_Donation_Form $form ) {
    $fields[ 'national_id_number' ] = array(
        'label'     => __( 'National ID Number', 'your-namespace' ), 
        'type'      => 'text',
        'priority'  => 24, 
        'value'     => $form->get_user_value( 'donor_national_id_number' ), 
        'required'  => true, 
        'data_type' => 'user'
    );

    return $fields;
}

add_filter( 'charitable_donation_form_user_fields', 'ed_collect_national_id_number', 10, 2 );
