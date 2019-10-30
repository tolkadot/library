<?php
/**
 * This snippet shows how to register new donation fields which will
 * be displayed to donors when they select the "Offline" payment method.
 */

/**
 * Register the new donation fields.
 */
add_action(
    'init',
    /**
     * The callback function. This will be run on the `init` hook.
     */
    function() {
        $fields = [
            'bank' => [
                'label'         => 'Bank',
                'data_type'     => 'meta',
                'donation_form' => [
                    'type'    => 'select',
                    'section' => 'offline-payment-gateway',
                    'options' => [
                        'bank-1' => 'Bank 1',
                        'bank-2' => 'Bank 2',
                        'bank-3' => 'Bank 3',
                    ]
                ],
                'email_tag'      => true,
                'show_in_export' => true,
            ],
            'iban' => [
                'label'         => 'IBAN',
                'data_type'     => 'meta',
                'donation_form' => [
                    'type'    => 'text',
                    'section' => 'offline-payment-gateway',
                ],
                'email_tag'      => true,
                'show_in_export' => true,
            ]
        ];

        $api = charitable()->donation_fields();

        foreach ( $fields as $key => $details ) {
            $api->register_field( new Charitable_Donation_Field( $key, $details ) );
        }
    }
);

/**
 * Add the offline donation fields to the donation form.
 */
add_filter(
    'charitable_donation_form_gateway_fields',
    /**
     * The callbck function. This will be run on the `charitable_donation_form_gateway_fields`
     * filter and is responsible for getting and returning all the fields registered to the
     * `offline-payment-gateway` section.
     */
    function( $fields, $gateway ) {
        if ( ! is_a( $gateway, 'Charitable_Gateway_Offline' ) ) {
            return $fields;
        }

        $form = new Charitable_Donation_Form();

        return $form->get_sanitized_donation_fields( 'offline-payment-gateway' );
    },
    10,
    2
);

/**
 * Finally, when saving the donation, make sure that these
 * values are added to the 'meta' array of fields to save.
 */
add_filter(
    'charitable_donation_form_submission_values',
    /**
     * The callback function. This will filter the default
     * array of form submission values.
     *
     * @param  array $values The submitted values as a structured array.
     * @return array
     */
    function( $values ) {
        foreach ( $values['gateways']['offline'] as $key => $value ) {
            $values['meta'][ $key ] = $value;
        }

        return $values;
    }
);
