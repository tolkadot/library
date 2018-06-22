<?php
/**
 * This example shows how to register a donation_plan_id field.
 *
 * This will display the recurring donation ID for a renewal donation
 * in the donations export.
 */
add_action( 'init', function() {
    $field = new Charitable_Donation_Field( 'donation_plan_id', array(
        'label'          => __( 'Recurring Donation Subscription ID', 'charitable' ),
		'data_type'      => 'core',
		'value_callback' => false,
		'donation_form'  => false,
		'admin_form'     => false,
		'show_in_meta'   => false,
		'email_tag'      => false,
        'show_in_export' => true,
    ) );
    
    charitable()->donation_fields()->register_field( $field );
} );