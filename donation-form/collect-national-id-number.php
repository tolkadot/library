<?php 
/**
 * Add a text field to the donation form.
 *
 * This field is added to the donor details section (by default, this is the section
 * with a header of "Your Details"). In the example below, we add a field that collects 
 * the donor's national ID number, but you can adapt this to your own needs by making
 * the following changes:
 *
 * 1. Replace every instance of 'national_id_number' with 'your_field'.
 * 2. Replace the field's label of 'National ID Number' with your the label for your field.
 *
 * IMPORTANT: This snippet only works in Charitable 1.5 or above.
 *
 * Related examples:
 *
 * @see Register a text field (detailed example) - https://github.com/Charitable/library/blob/master/donation-form/register-new-donation-field-1.5.php
 * @see Register a checkbox field - https://github.com/Charitable/library/blob/master/donation-form/add-checkbox-field-to-donation-form.php
 * @see Register multiple fields - https://github.com/Charitable/library/blob/master/donation-form/register-multiple-donation-fields.php
 * @see The old way to add fields - https://github.com/Charitable/library/blob/master/donation-form/legacy/collect-national-id-number.php
 */

function ed_charitable_register_national_id_number_field() {
    /**
     * Define a new text field.
     */
    $field = new Charitable_Donation_Field( 'national_id_number', array(
        'label' => __( 'National ID Number', 'charitable' ),
        'data_type' => 'user',
        'donation_form' => array(
            'show_after' => 'phone',
            'required'   => false,
        ),
        'admin_form' => true,
        'show_in_meta' => true,
        'show_in_export' => true,
        'email_tag' => array(
            'description' => __( 'The donor\'s national ID number' , 'charitable' ),
        ),
    ) );

    /**
     * Register the field.
     */
    charitable()->donation_fields()->register_field( $field );
}

add_action( 'init', 'ed_charitable_register_national_id_number_field' );
