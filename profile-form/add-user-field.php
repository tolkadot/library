<?php 

/**
 * This adds a field to the end of the "Your Details" section in the Profile form.
 *
 * In this example, we add a Birthday field, which is a date field. 
 *
 * @param   array                   $fields
 * @param   Charitable_Profile_Form $form
 */
function ed_add_user_field_to_profile_form( $fields, Charitable_Profile_Form $form ) {

    $fields[ 'donor_birthday' ] = array(
        'label'         => __( 'Birthday', 'your-namespace' ),
        'type'          => 'date',
        'priority'      => 36,
        'required'      => false,
        'value'         => $form->get_user_value( 'donor_birthday' )
    );

    return $fields;

}

add_filter( 'charitable_user_fields', 'ed_add_user_field_to_profile_form', 10, 2 );
