<?php 
/**
 * In Charitable 1.5, the method for registering new
 * donation fields has become much simpler. The old way
 * will still work, but it's more cumbersome and requires
 * much more code for the same effect.
 *
 * Related examples:
 *
 * @see Register a text field (simple example) - https://github.com/Charitable/library/blob/master/donation-form/collect-national-id-number.php
 * @see Register a checkbox field - https://github.com/Charitable/library/blob/master/donation-form/add-checkbox-field-to-donation-form.php
 * @see Register multiple fields - https://github.com/Charitable/library/blob/master/donation-form/register-multiple-donation-fields.php
 * @see The old way to add fields - https://github.com/Charitable/library/blob/master/donation-form/legacy/collect-national-id-number.php
 */
function ed_charitable_register_new_donation_field() {
    $field_args = array();
    $field_args['label'] = __( 'National ID Number', 'charitable' );

    /**
     * How the field will be stored. May be 'user' or 'meta'.
     *
     * 'meta' will be stored as a standalone meta field in wp_post_meta.
     * 'user' will be stored in the 'donor' meta record for a donation.
     */
    $field_args['data_type'] = 'user';

    /** 
     * Set to true if the field is shown in the donation form,
     * with the default form field args, or an array for finer
     * control over field arguments.
     *
     * Set to false for fields that do not belong in the donation form.
     *
     * To see all possible arguments, see https://github.com/Charitable/Charitable/blob/master/includes/fields/class-charitable-donation-field.php#L38-L108
     */ 
    $field_args['donation_form'] = array(
        'show_after' => 'phone',
        'required'   => false,
    );

    /**
     * Set to true if the field is shown in the admin donation form,
     * with the default form field args, or an array for finer
     * control over field arguments.
     *
     * Set to false for fields that do not belong in the admin form.
     *
     * To see all possible arguments, see https://github.com/Charitable/Charitable/blob/master/includes/fields/class-charitable-donation-field.php#L38-L108
     */
    $field_args['admin_form'] = array(
        'show_after' => 'phone',
        'required'   => false,
    );

    /* 
     * Whether to show this field in the donation meta.
     *
     * Set to true or false.
     */
    $field_args['show_in_meta'] = true;

    /* 
     * Whether to show this field in the donation export.
     *
     * Set to true or false.
     */
    $field_args['show_in_export'] = true;

    /**
     * Set to true to create an email tag for this field, with the label
     * as the description. Set to an array with a 'description' argument
     * to set the description.
     *
     * Set to false if the field doesn't need an email tag.
     */
    $field_args['email_tag'] = array(
        'description' => __( 'The donor\'s national ID number' , 'charitable' ),
    );

    /**
     * Now we create the field object with all our args.
     */
    $field = new Charitable_Donation_Field( 'national_id_number', $field_args );

    /**
     * And finally, we register it.
     */
    charitable()->donation_fields()->register_field( $field );
}

add_action( 'init', 'ed_charitable_register_new_donation_field' );
