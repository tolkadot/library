<?php 

/**
 * Automatically set the category for every submitted campaign.
 *
 * @param   array $submitted   The values submitted by the campaign creator.
 * @param   int   $campaign_id The campaign ID.
 */
function ed_charitable_set_default_campaign_category( $submitted, $campaign_id ) {

    // Replace it with 'campaign_tag' to set tags instead.
    $taxonomy = 'campaign_category';

    // Set the term by term slug or ID. You can also provide an array of terms.
    $term = 'category-1';

    wp_set_object_terms( $campaign_id, $term, $taxonomy, false );

}

add_action( 'charitable_campaign_submission_save', 'ed_charitable_set_default_campaign_category', 10, 2 );

/**
 * You may also want to remove the "categories" field from the frontend campaign submission form.
 *
 * @param   array $fields The default campaign form fields.
 * @return  array
 */
function ed_remove_categories_from_campaign_submissions( $fields ) {
    unset( $fields['campaign_category'] );
    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_remove_categories_from_campaign_submissions' );
