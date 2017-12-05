<?php 
/**
 * Collect a checkbox field in the donation form.
 *
 * This snippet only works in Charitable 1.5 or above.
 *
 * Related examples:
 *
 * @see Register a text field (detailed example) - https://github.com/Charitable/library/blob/master/donation-form/register-new-donation-field-1.5.php
 * @see Register multiple fields - https://github.com/Charitable/library/blob/master/donation-form/register-multiple-donation-fields.php
 * @see The old way to add fields - https://github.com/Charitable/library/blob/master/donation-form/legacy/add-checkbox-field-to-donation-form.php
 */
function ed_charitable_register_new_checkbox_field() {
    /**
     * Define a new checkbox field.
     */
    $field = new Charitable_Donation_Field( 'new_checkbox_field', array(
        'label' => __( 'New Checkbox Field', 'charitable' ),
        'data_type' => 'user',
        'donation_form' => array(
            'type' => 'checkbox',
            'show_before' => 'phone',
            'required'   => false,
        ),
        'admin_form' => true,
        'show_in_meta' => true,
        'show_in_export' => true,
        'email_tag' => array(
            'description' => __( 'The new checkbox field' , 'charitable' ),
        ),
    ) );

    /**
     * Register the checkbox field.
     */
    charitable()->donation_fields()->register_field( $field );
}

add_action( 'init', 'ed_charitable_register_new_checkbox_field' );
