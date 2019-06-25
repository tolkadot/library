<?php
/**
 * Make a single field required.
 *
 * For an example showing how to make multiple fields required, see:
 *
 * @see https://github.com/Charitable/library/blob/master/donation-form/make-donor-address-required.php
 *
 * As of Charitable 1.6 the approach below is the recommended way of achieving this.
 * If you are using an older version of Charitable, see the legacy version below:
 *
 * @see https://github.com/Charitable/library/blob/master/donation-form/legacy/make-donor-address-required.php
 *
 * @return void
 */
add_action(
    'init',
    function() {
        $fields = charitable()->donation_fields();

		/**
		 * Get the field using the field's key. Default options available:
		 *
		 * first_name
         * last_name
         * email
         * address
         * address_2
         * city
         * state
         * postcode
         * country
         * phone
		 * anonymous_donation - If using Anonymous Donations.
		 * donor_comment - If using Donor Comments.
		 */
		$fields->get_field( 'address' )->set( 'donation_form', 'required', true );
    }
);
