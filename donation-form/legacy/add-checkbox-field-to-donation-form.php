<?php 
/**
 * Collect a checkbox field in the donation form.
 *
 * Fields are added as a PHP array that define the field. You can customize the 
 * following fields: 
 *
 * label: The label that will be displayed alongside the field.
 * placeholder: Optionally, you can display a placeholder value to be shown inside the field. 
 * type: The type of field. Options: text, checkbox, datepicker, editor, file, multi-checkbox, number, picture, radio, select, textarea, url
 * priority: The priority of the field. This determines where in the form the field is displayed.
 * value: The current/default value of the field.
 * required: Whether the field is required. Set to `true` or `false`.
 * data_type: How the field is saved in the database. The simplest option is to use `user` as in the example below, which will automatically save the field to the user meta table.
 *
 * @param   array[] $fields
 * @param   Charitable_Donation_Form $form
 * @return  array[]
 */
function ed_collect_checkbox_field( $fields, Charitable_Donation_Form $form ) {

    /**
     * If you only want to collect a certain field on a certain campaign's 
     * donation form, uncomment this next section and replace 1234 with the
     * ID of your campaign.
     */    
    // if ( 1234 != $form->get_campaign()->ID ) {
    //     return $fields;   
    // }

    $fields['checkbox_field'] = array(
        'label'     => __( 'Checkbox Field', 'your-namespace' ), 
        'type'      => 'checkbox', 
        'priority'  => 24,
        'value'     => 1,
        'checked'   => array_key_exists( 'donor_checkbox_field', $_POST ) ? $_POST['donor_checkbox_field'] : $form->get_user_value( 'donor_checkbox_field' ),
        'required'  => true, 
        'data_type' => 'user'
    );

    return $fields;

}

add_filter( 'charitable_donation_form_user_fields', 'ed_collect_checkbox_field', 10, 2 );

/**
 * Display the Checkbox Field # in the admin donation details box.
 *
 * @param   array[] $meta
 * @param   Charitable_Donation $donation
 * @return  array[]
 */
function ed_show_checkbox_field_in_admin( $meta, $donation ) {

    $meta['checkbox_field'] = array(
        'label'     => __( 'Checkbox Field', 'your-namespace' ),
        'value'     => ed_donation_get_checkbox_field( $donation )
    );

    return $meta;

}

add_filter( 'charitable_donation_admin_meta', 'ed_show_checkbox_field_in_admin', 10, 2 );

/**
 * Display the Checkbox Field # in emails. 
 *
 * This function will only work if you are using Charitable 1.4+.
 *
 * Once you have added this snippet, you can display the value in your 
 * email like this: [charitable_email show=checkbox_field]
 *
 * To adapt this to your needs, you need to pay special attention to the 
 * filter name. In the example below, our filter name is 
 * `charitable_email_content_field_value_checkbox_field`. The 
 * `checkbox_field` part of this filter name should be whatever you 
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
function ed_show_checkbox_field_in_email( $value, $args, Charitable_Email $email ) {

    if ( $email->has_valid_donation() ) {
        $value = ed_donation_get_checkbox_field( $email->get_donation() );
    }

    return $value;

}

add_filter( 'charitable_email_content_field_value_checkbox_field', 'ed_show_checkbox_field_in_email', 10, 3 );

/**
 * Include the Checkbox Field as a column in the Donations export.
 *
 * @param   array $columns
 * @return  array
 */

function ed_donation_export_add_checkbox_field_column( $columns ) {

    $columns['checkbox_field'] = __( 'Checkbox Field', 'your-namespace' );
    return $columns;

}

add_filter( 'charitable_export_donations_columns', 'ed_donation_export_add_checkbox_field_column' );

/**
 * Add the Checkbox Field value for donation.
 * 
 * @param   mixed  $value
 * @param   string $key
 * @param   array  $data
 * @return  mixed
 */
function ed_donation_export_add_checkbox_field_value( $value, $key, $data ) {

    if ( 'checkbox_field' != $key ) {
        return $value;
    }

    return ed_donation_get_checkbox_field( charitable_get_donation( $data['donation_id'] ) );

}

add_filter( 'charitable_export_data_key_value', 'ed_donation_export_add_checkbox_field_value', 10, 3 );

/**
 * A helper function to get the Checkbox Field for a donation.
 *
 * @param   Charitable_Donation $donation
 * @return  string
 */
function ed_donation_get_checkbox_field( $donation ) {

    $data = $donation->get_donor_data();

    if ( array_key_exists( 'checkbox_field', $data ) && $data['checkbox_field'] ) {
        return __( 'Checked', 'your-namespace' );
    }

    return __( 'Unchecked', 'your-namespace' );

}
