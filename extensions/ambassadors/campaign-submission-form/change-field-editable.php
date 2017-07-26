<?php
/**
 * This example shows how you can change editable fields to non-editable,
 * and vice versa, in the campaign form.
 *
 * Non-editable fields:
 * 
 * post_title - Campaign Name
 * goal - Fundraising Goal ($)
 * length - Length
 * 
 * Editable fields:
 *
 * description - Short Description
 * post_content - Full Description
 * image - Featured Image
 * campaign_category - Categories
 * campaign_tag - Tags
 *
 * @param   array $fields The fields.
 * @return  array
 */
function ed_charitable_change_field_editable( $fields ) {

    /**
     * Make the post title field editable.
     */
    $fields['post_title']['editable'] = true;

    /**
     * Make the description field non-editable.
     */
    $fields['description']['editable'] = false;

    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_change_field_editable' );
