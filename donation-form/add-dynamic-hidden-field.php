<?php
/**
 * In this example, a new donation field is created but left out of the
 * front-end donation form. Instead, it is dynamically set as a hidden
 * field in the donation form, based on the ID of the page that the
 * donation form is on.
 *
 * Here, the profile ID is only recorded when the donation is made on a
 * custom post type with a post type of "profile".
 */
add_action(
	'init',
	function() {
		/* Create the Donation Field instance. */
		$field = new Charitable_Donation_Field(
			'profile_id',
			array(
				'label'          => 'Profile ID',
				'data_type'      => 'meta',
				'value_callback' => false,
				'donation_form'  => false,
				'admin_form'     => true,
				'show_in_meta'   => true,
				'show_in_export' => true,
				'email_tag'      => false,
			)
		);

		/* Register it. */
		charitable()->donation_fields()->register_field( $field );
	}
);

add_filter(
	'charitable_donation_form_hidden_fields',
	function( $fields ) {
		/* Only record a "profile_id" when the current post type is "profile". */
		if ( 'profile' == get_post_type() ) {
			$fields['profile_id'] = get_the_ID();
		}

		return $fields;
	}
);
