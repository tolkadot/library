<?php
/**
 * In this example we add an additional field to the "Who Are You Raising Money For?"
 * section in the campaign submission form.
 *
 * NOTE: This is only visible if ambassadors can submit fundraisers for your organization
 * as well as their own personal causes.
 */
function ed_charitable_ambassadors_add_field_to_recipient_section( $fields, $form ) {
    $fields['extra_field'] = array(
        'label'     => 'Extra Field',
        'type'      => 'text',
        'priority'  => 50,
        'data_type' => 'meta',
    );

    return $fields;
}

add_filter( 'charitable_campaign_submission_recipient_fields', 'ed_charitable_ambassadors_add_field_to_recipient_section', 10, 2 );

/**
 * Given a campaign ID, you can find the value for the above field for a
 * particular campaign like this:

$campaign_id = 123;
$campaign    = charitable_get_campaign( $campaign_id );
$field       = $campaign->get( 'extra_field' );

 */