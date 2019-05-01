<?php
/**
 * This example shows how to remove fields from the donation form.
 *
 * Note that this approach requires Charitable 1.6 or above. If you are
 * on a previous version of Charitable, see the link below for a legacy
 * way of doing the same thing:
 *
 * @see https://github.com/Charitable/library/blob/master/donation-form/legacy/remove-donation-form-fields.php
 */
add_action(
    'init',
    function() {
        $fields_api = charitable()->donation_fields();

        /**
         * In this example, we remove the last name field. But you can
         * easily modify this example to remove any other fields by swapping
         * 'last_name' for the key of the field you would like to remove.
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
         */
        $fields_api->get_field( 'last_name' )->set( 'donation_form', '', false );
    }
);
