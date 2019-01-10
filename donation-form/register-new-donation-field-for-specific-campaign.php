<?php
/**
 * This example shows how to add a new donation field to your site, but
 * only display it in the front-end donation form for a particular campaign.
 *
 * Related examples:
 *
 * @see Register a text field (detailed example) - https://github.com/Charitable/library/blob/master/donation-form/register-new-donation-field-1.5.php
 * @see Register a text field (simple example) - https://github.com/Charitable/library/blob/master/donation-form/collect-national-id-number.php
 * @see Register a checkbox field - https://github.com/Charitable/library/blob/master/donation-form/add-checkbox-field-to-donation-form.php
 * @see Register multiple fields - https://github.com/Charitable/library/blob/master/donation-form/register-multiple-donation-fields.php
 */

/**
 * First of all, we register our new donation field.
 *
 * Also note that the fields will be included in the admin donation
 * form as well. Set admin_form to false if you would like to disable that.
 */
function ed_charitable_register_new_donation_field() {
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
}

add_action( 'init', 'ed_charitable_register_new_donation_field' );

/**
 * Next, remove the custom field from the front-end donation form
 * unless we're donating to a particular campaign.
 *
 * @param  array[] $fields
 * @param  Charitable_Donation_Form $form
 * @return array[]
 */
function ed_charitable_conditionally_show_custom_field( $fields, Charitable_Donation_Form $form ) {
	/**
	 * If you only want to collect a certain field on a certain campaign's
	 * donation form, uncomment this next section and replace 1234 with the
	 * ID of your campaign.
	 */
	if ( 8 != $form->get_campaign()->ID ) {
		unset( $fields['new_text_field'] );
	}

	return $fields;
}

add_filter( 'charitable_donation_form_user_fields', 'ed_charitable_conditionally_show_custom_field', 10, 2 );