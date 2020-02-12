<?php
/**
 * In this function we register a new donation field with a
 * key of `receipt_opt_out`. If the donor checks this, it means
 * they don't want to receive their donation receipt.
 */
add_action(
	'init',
	function() {
		$field = new Charitable_Donation_Field(
			'receipt_opt_out',
			array(
				'label'          => 'Donation receipt opt-out',
				'data_type'      => 'meta',
				'donation_form'  => array(
					'label'   => 'I do not need a receipt.',
					'type'    => 'checkbox',
					'default' => 0,
					'section' => 'meta',
				),
				'show_in_meta'   => true,
				'show_in_export' => true,
				'email_tag'      => false,
			)
		);

		charitable()->donation_fields()->register_field( $field );
	}
);

/**
 * This function checks whether to send the donation receipt.
 *
 * Since our checkbox was set up in such a way that people have to
 * check it to opt out of getting the receipt, we want to return true
 * if that checkbox was not checked, and false otherwise.
 *
 * @param  boolean                 $send     Whether to send the email. This defaults to true,
 *                                           so if it has been set to false already, we will
 *                                           assume we don't want to send it.
 * @param  int|Charitable_Donation $donation The donation object or ID.
 * @return boolean
 */
function ed_charitable_check_send_donation_receipt_email( $send, $donation ) {
	/* If it's already blocked, we don't need to do anything else. */
	if ( ! $send ) {
		return $send;
	}

	if ( is_int( $donation ) ) {
		$donation = charitable_get_donation( $donation );
	}

	/* We return false (i.e. we don't want to send the email) if `receipt_opt_out` is true. */
	return ! $donation->get( 'receipt_opt_out' );
}

/* Block it for normal donations. */
add_filter( 'charitable_send_donation_receipt', 'ed_charitable_check_send_donation_receipt_email', 10, 2 );

/* Block the Offline donation receipt. */
add_filter( 'charitable_send_offline_donation_receipt', 'ed_charitable_check_send_donation_receipt_email', 10, 2 );
