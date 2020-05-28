<?php
/**
 * As of Ambassadors 2.0, this is no longer required since Ambassadors
 * has built-in support for adding the submission data to the "Submission
 * Details" tab.
 */

/**
 * This example shows how to add extra fields of information to the Funds Recipient
 * tab, which is displayed for all campaigns in the admin.
 *
 * In the example below, all of the fields in the User Details section of the frontend
 * campaign form are added to the table. If you only want to add one or two fields,
 * you can add them as follows:

$key = 'field-you-want-to-add';

$data[ 'field-you-want-to-add' ] = array(
    'label' => __( 'My Field Label', 'your-namespace' ),
    'value' => isset( $submitted[ $key ] ) ? $submitted[ $key ] : '-'
);

 * NOTE: You must always remember to finish the function with 'return $data;'.
 */

/**
 * Add extra submitted fields to the Funds Recipient tab in the campaign admin page.
 *
 * @param   array $data
 * @param   Charitable_Campaign $campaign
 * @return  array $data
 */
function ed_add_campaign_funding_data( $data, Charitable_Campaign $campaign ) {

    // Get the data that was submitted when the campaign was added.
    $submitted = $campaign->get( 'submission_data' );

    $campaign_form = new Charitable_Ambassadors_Campaign_Form();

    // Go through all user fields and add their value to the list of fields to display.
    foreach ( $campaign_form->get_user_fields() as $key => $field ) {

        $data[ $key ] = array(
            'label' => ( isset( $field[ 'label' ] ) ? $field[ 'label' ] : $key ),
            'value' => ( isset( $submitted[ $key ] ) ? $submitted[ $key ] : '-' )
        );

    }

    return $data;

}

add_filter( 'charitable_ambassadors_campaign_funds_recipient_data', 'ed_add_campaign_funding_data', 20, 2 );