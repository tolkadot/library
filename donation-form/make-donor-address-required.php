<?php
/**
 * Make all address fields required.
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
        /**
         * These are the fields that we will make required.
         */
        $required_fields = array(
            'address',
            // 'address_2',
            'city',
            'state',
            'postcode',
            'country',
            'phone'
        );

        $fields = charitable()->donation_fields();

        foreach ( $required_fields as $field ) {
            $fields->get_field( $field )->set( 'donation_form', 'required', true );
        }
    }
);
