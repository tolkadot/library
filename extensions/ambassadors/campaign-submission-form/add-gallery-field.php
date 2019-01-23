<?php

/**
 * Add a gallery field to the campaign submission form.
 *
 * @param   array                                $fields
 * @param   Charitable_Ambassadors_Campaign_Form $form
 * @return  array
 */
function ed_charitable_add_campaign_gallery_field( $fields, $form ) {

    $campaign = $form->get_campaign();

    if ( $campaign ) {
        $campaign_id = $campaign->ID;
        $gallery     = $campaign->get( 'gallery' );
    }
    else {
        $campaign_id = 0;
        $gallery     = isset( $_POST['gallery'] ) ? $_POST['gallery'] : '';
    }

    $fields['gallery'] = array(
        'label'         => __( 'Gallery', 'your-namespace' ),
        'type'          => 'picture',
        'priority'      => 17,
        'required'      => false,
        'fullwidth'     => true,
        'size'          => 70,
        'uploader'      => true,
        'max_uploads'   => 5,
        'parent_id'     => $campaign_id,
        'value'         => $gallery,
        'data_type'     => 'meta',
        'page'          => 'campaign_details',
        'help'          => __( 'Upload one to five photos to display on your campaign page as a gallery.', 'your-namespace' ),
    );

    return $fields;

}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_add_campaign_gallery_field', 11, 2 );

/**
 * Set the gallery to empty if all images are removed.
 *
 * @param   array $submitted The values submitted by ther user.
 * @return  array
 */
function ed_charitable_save_campaign_gallery( $submitted ) {
    if ( ! array_key_exists( 'gallery', $submitted ) ) {
        $submitted['gallery'] = '';
    }

    return $submitted;
}

add_filter( 'charitable_campaign_submission_meta_data', 'ed_charitable_save_campaign_gallery' );

/**
 * Append the gallery to the campaign page.
 *
 * @param   string $content
 * @return  string
 */
function ed_charitable_add_gallery_to_campaign( $content ) {

    if ( Charitable::CAMPAIGN_POST_TYPE != get_post_type() ) {
        return $content;
    }

    $gallery = get_post_meta( get_the_ID(), '_campaign_gallery', true );

    if ( empty( $gallery ) ) {
        return $content;
    }

    ob_start();

    echo $content;

    echo do_shortcode( '[gallery ids=' . implode( ',', $gallery ) . ']' );

    return ob_get_clean();

}

add_filter( 'the_content', 'ed_charitable_add_gallery_to_campaign', 11 );