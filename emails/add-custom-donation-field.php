<?php

/**
 * This example shows how you can add a new donation field to be displayed
 * in Charitable emails related to donations.
 */

/**
 * Register the extra field.
 *
 * @param   array            $fields
 * @param   Charitable_Email $email
 * @return  array
 */
function ed_charitable_add_extra_donation_field( $fields, Charitable_Email $email ) {

	if ( ! in_array( 'donation', $email->get_object_types() ) ) {
		return $fields;
	}

	$fields['extra_donation_field'] = array(
		'description' => __( 'Extra field description', 'your-namespace' ),
		'callback'    => 'ed_charitable_get_extra_donation_field_value',
	);

	return $fields;

}

add_filter( 'charitable_email_content_fields', 'ed_charitable_add_extra_donation_field', 10, 2 );

/**
 * Get the content to be displayed for the extra donation field.
 *
 * @param   string           $default
 * @param   array            $args
 * @param   Charitable_Email $email
 * @return  string
 */
function ed_charitable_get_extra_donation_field_value( $default, $args, $email ) {

	if ( ! $email->has_valid_donation() ) {
		return '';
	}

	/**
	 * Get the actual content you want to display in the emails. In
	 * this example, we're showing a custom meta field with a key
	 * `extra_donation_field`.
	 */
	return get_post_meta( $email->get_donation()->ID, 'extra_donation_field', true );

}

/**
 * To help with previewing emails, you can also define a fake value for your field.
 *
 * @param   array            $fields
 * @param   Charitable_Email $email
 * @return  array
 */
function ed_charitable_preview_extra_donation_field( $fields, Charitable_Email $email ) {

	if ( ! in_array( 'donation', $email->get_object_types() ) ) {
		return $fields;
	}

	$fields['extra_donation_field'] = 'My Fake Value';

	return $fields;

}

add_filter( 'charitable_email_preview_content_fields', 'ed_charitable_preview_extra_donation_field', 10, 2 );
