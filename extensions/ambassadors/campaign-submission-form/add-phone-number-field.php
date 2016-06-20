<?php 

/**
 * This example shows how to add a new field to the User Details section of 
 * the Campaign Submission form.
 *
 * If you also want to display your field in the Funds Recipient tab in the 
 * admin, see the code snippet at https://github.com/Charitable/library/blob/master/extensions/ambassadors/campaign-submission-form/add-user-details-to-funds-recipient-information.php
 */

/**
 * Collect the user's phone number on the frontend campaign submission form.
 *
 * @param   array $fields
 * @param   Charitable_Ambassadors_Campaign_Form $form
 * @return  array $fields
 */
function ed_add_phone_number_field_to_campaign_submissions( $fields, Charitable_Ambassadors_Campaign_Form $form ) { 
    
    $fields[ 'phone' ] = array(
        'label'         => __( 'Phone Number', 'your-namespace' ), 
        'type'          => 'text', 
        'priority'      => 53, 
        'required'      => false,
        'value'         => $form->get_user_value( 'donor_phone' ), 
        'data_type'     => 'user' 
    );

    return $fields;

}

add_filter( 'charitable_campaign_submission_user_fields', 'ed_add_phone_number_field_to_campaign_submissions', 10, 2 );
