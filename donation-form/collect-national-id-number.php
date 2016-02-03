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

/**
 * Display the National ID # in the admin donation details box.
 *
 * @param   array[] $meta
 * @param   Charitable_Donation $donation
 * @return  array[]
 */
function ed_show_national_id_number_in_admin( $meta, $donation ) {
    $donor_data = $donation->get_donor_data();

    $meta[ 'national_id_number' ] = array(
        'label'     => __( 'National ID Number', 'your-namespace' ),
        'value'     => $donor_data[ 'national_id_number' ]
    );

    return $meta;
}

add_filter( 'charitable_donation_admin_meta', 'ed_show_national_id_number_in_admin', 10, 2 );