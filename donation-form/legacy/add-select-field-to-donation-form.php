<?php 
/**
 * Add a select field to the donation form.
 *
 * Fields are added as a PHP array that define the field. You can customize the following fields: 
 *
 * label: The label that will be displayed alongside the field.
 * placeholder: Optionally, you can display a placeholder value to be shown inside the field. 
 * type: The type of field. Options: text, checkbox, datepicker, editor, file, multi-checkbox, number, picture, radio, select, textarea, url
 * priority: The priority of the field. This determines where in the form the field is displayed.
 * value: The current/default value of the field.
 * required: Whether the field is required. Set to `true` or `false`.
 * data_type: How the field is saved in the database. The simplest option is to use `user` as in the example below, which will automatically save the field to the user meta table.
 * options: An array of options that can be selected.
 *
 * @param   array[]                  $fields
 * @param   Charitable_Donation_Form $form
 * @return  array[]
 */
function ed_charitable_add_donation_form_select_field( $fields, Charitable_Donation_Form $form ) {

    /**
     * If you only want to collect a certain field on a certain campaign's 
     * donation form, uncomment this next section and replace 1234 with the
     * ID of your campaign.
     */    
    // if ( 1234 != $form->get_campaign()->ID ) {
    //     return $fields;   
    // }

    /**
     * Set up the options that people can choose from in the select field.
     */
    $options = array(
        'yes' => __( 'Yes', 'custom-namespace' ),
        'no'  => __( 'No', 'custom-namespace' ),
    );

    /**
     * Add the field to the array of fields.
     */
    $fields['select_field'] = array(
        'label'     => __( 'Select Field', 'your-namespace' ), 
        'type'      => 'select', 
        'priority'  => 24,
        'value'     => $form->get_user_value( 'donor_select_field' ),
        'required'  => true, 
        'data_type' => 'user',
        'options'   => $options,
    );

    return $fields;

}

add_filter( 'charitable_donation_form_user_fields', 'ed_charitable_add_donation_form_select_field', 10, 2 );

/**
 * Display the Select Field # in the admin donation details box.
 *
 * @param   array[] $meta
 * @param   Charitable_Donation $donation
 * @return  array[]
 */
function ed_show_select_field_in_admin( $meta, $donation ) {

    $meta['select_field'] = array(
        'label'     => __( 'Select Field', 'your-namespace' ),
        'value'     => ed_donation_get_select_field( $donation )
    );

    return $meta;

}

add_filter( 'charitable_donation_admin_meta', 'ed_show_select_field_in_admin', 10, 2 );

/**
 * Display the Select Field # in emails. 
 *
 * This function will only work if you are using Charitable 1.4+.
 *
 * Once you have added this snippet, you can display the value in your 
 * email like this: [charitable_email show=select_field]
 *
 * To adapt this to your needs, you need to pay special attention to the 
 * filter name. In the example below, our filter name is 
 * `charitable_email_content_field_value_select_field`. The 
 * `select_field` part of this filter name should be whatever you 
 * use in the shortcode for the show parameter. In other words, if this 
 * is your shortcode: 
 *
 * [charitable_email show=my_amazing_field]
 * 
 * This would be your filter name: 
 *
 * charitable_email_content_field_value_my_amazing_field
 *
 * Out of convention, we suggest replacing both with the identifier 
 * for your field that you use throughout, which is what we have done 
 * in this example.
 *
 * @param   string $value
 * @param   array $args
 * @param   Charitable_Email $email
 * @return  string
 */
function ed_show_select_field_in_email( $value, $args, Charitable_Email $email ) {

    if ( $email->has_valid_donation() ) {
        $value = ed_donation_get_select_field( $email->get_donation() );
    }

    return $value;

}

add_filter( 'charitable_email_content_field_value_select_field', 'ed_show_select_field_in_email', 10, 3 );

/**
 * Include the Select Field as a column in the Donations export.
 *
 * @param   array $columns
 * @return  array
 */

function ed_donation_export_add_select_field_column( $columns ) {

    $columns['select_field'] = __( 'Select Field', 'your-namespace' );
    return $columns;

}

add_filter( 'charitable_export_donations_columns', 'ed_donation_export_add_select_field_column' );

/**
 * Add the Select Field value for donation.
 * 
 * @param   mixed  $value
 * @param   string $key
 * @param   array  $data
 * @return  mixed
 */
function ed_donation_export_add_select_field_value( $value, $key, $data ) {

    if ( 'select_field' != $key ) {
        return $value;
    }

    return ed_donation_get_select_field( charitable_get_donation( $data['donation_id'] ) );

}

add_filter( 'charitable_export_data_key_value', 'ed_donation_export_add_select_field_value', 10, 3 );

/**
 * A helper function to get the Select Field for a donation.
 *
 * @param   Charitable_Donation $donation
 * @return  string
 */
function ed_donation_get_select_field( $donation ) {

    return $donation->get_donor()->get_donor_meta( 'select_field' );

}
