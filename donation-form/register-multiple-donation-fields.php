<?php 
/**
 * If you want to add multiple new fields to your donation form, 
 * you can do that in a single function.
 *
 * In the example below, we add three separate fields:
 *
 * - a text field
 * - a checkbox field
 * - a textarea field
 *
 * Note that we can use the show_before and show_after settings
 * in the donation_form array to specify where the field should appear.
 *
 * Also note that these fields will be included in the admin donation
 * form as well. Set admin_form to false if you would like to disable that.
 *
 * Related examples:
 *
 * @see Register a text field (detailed example) - https://github.com/Charitable/library/blob/master/donation-form/register-new-donation-field-1.5.php
 * @see Register a text field (simple example) - https://github.com/Charitable/library/blob/master/donation-form/collect-national-id-number.php
 * @see Register a checkbox field - https://github.com/Charitable/library/blob/master/donation-form/add-checkbox-field-to-donation-form.php
 */
function ed_charitable_register_new_donation_fields() {
    /**
     * Define a new text field.
     */
    $field = new Charitable_Donation_Field( 'new_text_field', array(
        'label' => __( 'New Text Field', 'charitable' ),
        'data_type' => 'user',
        'donation_form' => array(
            'show_after' => 'phone',
            'required'   => false,
        ),
        'admin_form' => true,
        'show_in_meta' => true,
        'show_in_export' => true,
        'email_tag' => array(
            'description' => __( 'The new text field' , 'charitable' ),
        ),
    ) );

    /**
     * Register the text field.
     */
    charitable()->donation_fields()->register_field( $field );

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

    /**
     * Define a new textarea (paragraph) field.
     */
    $field = new Charitable_Donation_Field( 'new_textarea_field', array(
        'label' => __( 'New Textarea Field', 'charitable' ),
        'data_type' => 'user',
        'donation_form' => array(
            'type' => 'textarea',
            'show_after' => 'country',
            'required'   => false,
        ),
        'admin_form' => true,
        'show_in_meta' => true,
        'show_in_export' => true,
        'email_tag' => array(
            'description' => __( 'The new textarea field' , 'charitable' ),
        ),
    ) );

    /**
     * Register the textarea field.
     */
    charitable()->donation_fields()->register_field( $field );
}

add_action( 'init', 'ed_charitable_register_new_donation_fields' );
