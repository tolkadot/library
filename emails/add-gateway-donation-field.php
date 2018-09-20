<?php
/**
 * This snippet shows how to enable an email tag for the gateway_label
 * donation field.
 *
 * This same pattern can be used to enable email tags for other
 * donation fields. Find a list of the default donation fields
 * inside Charitable at includes/fields/default-fields/donation-fields.php
 */
function ed_charitable_add_donation_gateway_email_tag() {
	charitable()->donation_fields()->get_field( 'gateway_label' )->email_tag = true;
}

add_action( 'init', 'ed_charitable_add_donation_gateway_email_tag' );
