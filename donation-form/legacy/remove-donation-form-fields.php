<?php
/**
 * As of Charitable 1.6, there is a better way to do this!
 *
 * @see https://github.com/Charitable/library/blob/39a4e6eaa2f974ab92674eb7542a095e7040aec0/donation-form/remove-donation-form-fields.php
 *
 * This example shows how to remove fields from the donation form.
 *
 * In this example, we remove the phone field, but you can modify this
 * code snippet to remove other fields instead. Any of the following
 * fields can be removed:
 *
 * first_name
 * last_name
 * address
 * address_2
 * city
 * state
 * postcode
 * country
 * phone
 *
 * @param   array[] $fields
 * @return  array[]
 */
function en_remove_donation_form_fields( $fields ) {

    /**
     * To remove other fields, just replace 'phone' with the key of the
     * field you want to remove instead. You can remove multiple fields
     * by comma-separating the fields inside of the unset function. Example:
     *
     * unset( $fields[ 'phone' ], $fields[ 'country' ] );
     */
    unset( $fields[ 'phone' ] );

    return $fields;
}

add_filter( 'charitable_donation_form_user_fields', 'en_remove_donation_form_fields' );