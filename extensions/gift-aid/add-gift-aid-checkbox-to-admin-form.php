<?php
/**
 * By default, Gift Aid is not editable when creating or
 * editing a donation in the admin, since claiming Gift Aid
 * is a donor's choice and depends on their tax status.
 *
 * However, if you require the ability to toggle Gift Aid
 * on or off in the admin, the snippet below will achieve
 * this for you.
 */
add_filter(
	'charitable_default_donation_fields',
	function( $fields ) {
		if ( isset( $fields['giftaid'] ) ) {
			$fields['giftaid']['admin_form'] = array(
				'type'           => 'checkbox',
				'section'        => 'meta',
				'priority'       => 20,
				'value_callback' => 'charitable_get_donation_meta_value',
				'label'          => 'Claim Gift Aid on donation',
			);
		}

		return $fields;
	},
	2
);
