<?php
/**
 * Default the campaign title to the name of the Ambassador.
 */
function ed_charitable_set_default_campaign_title( $fields, $form ) {
    if ( empty( $fields['post_title']['value'] ) ) {
        $name = $form->get_user()->get_name();
        
        if ( ! empty( $name ) ) {
            $fields['post_title']['value'] = sprintf( "%s's Fundraiser", $name );
        }
    }
    
    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_set_default_campaign_title', 10, 2 );