<?php
/**
 * This is the full code for a tutorial written on the WP Charitable blog.
 *
 * For a step by step explanation of what each bit of code does and why,
 * read the post:
 *
 * @see https://www.wpcharitable.com/an-inside-look-at-aware-whistlers-unique-30-for-30-fundraiser-tutorial/
 */

/**
 * STEP 1: Register the "Company Name" Donation Field.
 *
 * On the `init` hook, we create a new Donation Field. It has a
 * key of `company_name` (this is how we will reference it later),
 * and it's set up as a required field in the donation form, shown
 * after the `last_name` field.
 */
add_action( 'init', function() {
	/**
	 * Add a "Company Name" field.
	 */
	$field = new Charitable_Donation_Field(
		'company_name',
		[
			'label' => 'Company Name',
			'data_type' => 'user',
			'donation_form' => [
				'show_after' => 'last_name',
				'required' => true,
			],
			'admin_form' => true,
			'show_in_meta' => true,
			'show_in_export' => true,
			'email_tag' => [
				'description' => 'The company name',
			],
		]
	);

	/**
	 * Register the field.
	 */
	charitable()->donation_fields()->register_field( $field );
}, 100 );

/**
 * STEP 2: Only show the field on a specific campaign.
 *
 * We only want the field to show up on a single campaign's
 * form, so we *remove* it from all other campaigns' donation
 * forms.
 */
add_filter( 'charitable_donation_form_user_fields', function( $fields, Charitable_Donation_Form $form ) {
	/**
	 * Check the campaign ID of the donation form being
	 * shown. If it isn't the one where we want the field,
	 * remove the field using the unset() function.
	 */
	if ( 123 != $form->get_campaign()->ID ) {
		unset( $fields['company_name'] );
	}

	return $fields;
}, 10, 2 );

/**
 * STEP 3: Use the company name for the donor name.
 *
 * When showing the donor name for a particular donation,
 * check if the donation was to the campaign with our
 * Company Name field. If it was, show the Company Name
 * instead of the individual's name.
 */
add_filter( 'charitable_donor_loop_donor_name', function( $name, $args ) {
	/**
	 * Get the Donor object from the argument array.
	 */
	$donor = $args['donor'];

	/**
	 * Check if there is a Donation object associated
	 * with this Donor.
	 */
	$donation = $donor->get_donation();

	if ( ! $donation ) {
		return $name;
	}

	/**
	 * Get the campaign that received the donation.
	 */
	$campaign_id = current( $donation->get_campaign_donations() )->campaign_id;

	/**
	 * If this was a donation to our campaign,
	 * let's change the donor name.
	 */
	if ( 123 == $campaign_id ) {
		$name = $donation->get( 'company_name' );
	}

	return $name;
}, 11, 2 );
