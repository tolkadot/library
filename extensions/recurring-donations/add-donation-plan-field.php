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
					'donation_form'  => false,
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

/**
 * Prevent recurring donation receipt email from sending if we are saving the donation via the admin.
 *
 * @param  boolean             $send_email Whether to send the email.
 * @param  Charitable_Donation $donation   The donation object.
 * @return boolean
 */
add_filter(
	'charitable_send_recurring_donation_receipt',
	function( $send_email, Charitable_Donation $donation ) {
		if ( ! $send_email ) {
			return $send_email;
		}

		$helper = Charitable_Donation_Meta_Boxes::get_instance();

		/* Don't block sending it from donation actions. */
		if ( $helper->is_donation_action() ) {
			return $send_email;
		}

		/* If we're not saving the donation, send the email. */
		if ( ! $helper->is_admin_donation_save() ) {
			return $send_email;
		}

		/* If this isn't the `charitable_after_save_donation` hook, don't send the email. */
		if ( ! doing_action( 'charitable_after_save_donation' ) ) {
			return false;
		}

		/* If this isn't a manually created donation, send the email. */
		if ( 'manual' !== $donation->get_gateway() ) {
			return $send_email;
		}

		return isset( $_POST['send_donation_receipt'] ) && $_POST['send_donation_receipt'];
	},
	10,
	2
);