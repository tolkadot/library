<?php
/**
 * Register a donation_plan field to allow it to be edited
 * in the admin donation form.
 */
add_action(
	'init',
	function() {
		$fields = charitable()->donation_fields();
		$fields->register_field(
			new Charitable_Donation_Field(
				'donation_plan',
				array(
					'label'          => __( 'Parent Donation ID', 'charitable' ),
					'data_type'      => 'core',
					'value_callback' => function( Charitable_Abstract_Donation $donation, $key ) {
						return $donation->get_donation_plan_id();
					},
					'admin_form'     => array(
						'priority' => 10,
						'type'     => 'text',
						'default'  => 0,
						'section'  => 'meta',
					),
					'email_tag'      => false,
					'show_in_export' => true,
				)
			)
		);
	}
);

/**
 * Required to ensure the donation plan saves when submitting the admin form.
 */
add_filter(
	'charitable_admin_donation_form_submission_values',
	function( $values, Charitable_Admin_Donation_Form $form ) {
		$values['donation_plan'] = (int) $form->get_submitted_value( 'donation_plan');
		return $values;
	},
	10,
	2
);
