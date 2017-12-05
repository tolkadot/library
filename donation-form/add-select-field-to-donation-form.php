<?php 
/**
 * Add a select field to the donation form.
 *
 * Fields are added as a PHP array that define the field.
 *
 * This snippet only works in Charitable 1.5 or above.
 *
 * Related examples:
 *
 * @see Register a text field (detailed example) - https://github.com/Charitable/library/blob/master/donation-form/register-new-donation-field-1.5.php
 * @see Register a checkbox field - https://github.com/Charitable/library/blob/master/donation-form/add-checkbox-field-to-donation-form.php
 * @see Register multiple fields - https://github.com/Charitable/library/blob/master/donation-form/register-multiple-donation-fields.php
 * @see The old way to add select fields - https://github.com/Charitable/library/blob/master/donation-form/legacy/add-select-field-to-donation-form.php
 */
function ed_charitable_register_new_select_field() {
    /**
     * Set up the options that people can choose from in the select field.
     */
    $options = array(
        'yes' => __( 'Yes', 'custom-namespace' ),
        'no'  => __( 'No', 'custom-namespace' ),
    );

    /**
     * Define a new select field.
     */
    $field = new Charitable_Donation_Field( 'new_select_field', array(
        'label' => __( 'New Select Field', 'custom-namespace' ),
        'data_type' => 'user',
        'donation_form' => array(
            'type' => 'select',
            'show_before' => 'phone',
            'required' => false,
            'options' => $options,
        ),
        'admin_form' => true,
        'show_in_meta' => true,
        'show_in_export' => true,
        'email_tag' => array(
            'description' => __( 'The new select field' , 'charitable' ),
        ),
    ) );

    /**
     * Register the select field.
     */
    charitable()->donation_fields()->register_field( $field );
}

add_action( 'init', 'ed_charitable_register_new_select_field' );
