<?php
/**
 * This is an example showing how you can change the labels of different fields
 * within the campaign submission form.
 *
 * In our example, we will change the length and title fields, but you can adapt
 * this example to change any of the following fields. Each field is shown here with
 * its "key" on the left (i.e. post_title) and its default title on the right (Campaign Name).
 * When you modify the label, you use the key.
 *
 * post_title - Campaign Name
 * description - Short Description
 * goal - Fundraising Goal ($)
 * length - Length
 * post_content - Full Description
 * image - Featured Image
 * categories - Categories
 * tags - Tags
 */
function ed_change_campaign_submission_campaign_field_label( $fields ) {

    /**
     * Change the post_title field label.
     */
    $fields['post_title']['label'] = __( 'Campaign Title', 'your-namespace' );

    /**
     * Change the length field label
     */
    $fields['length']['label'] = __( 'Length in days', 'your-namespace' );

    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_change_campaign_submission_campaign_field_label' );

/**
 * You can also modify the labels of the fields inside the Your Details section.
 *
 * In our example, we will change the last name field, but you can adapt this
 * to change any of the following fields:
 *
 * first_name
 * last_name
 * user_email
 * city
 * state
 * country
 * user_description
 * organisation
 */
function ed_change_campaign_submission_user_field_label( $fields ) {

    /**
     * Change the last_name field label.
     */
    $fields['last_name']['label'] = __( 'Surname', 'your-namespace' );

    return $fields;
}

add_filter( 'charitable_campaign_submission_user_fields', 'ed_change_campaign_submission_campaign_field_label' );