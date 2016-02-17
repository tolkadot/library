<?php 

/**
 * Don't sanitize campaign description text.
 *
 * This can be used if you want to allow HTML to be added to the campaign description, 
 * which would otherwise get filtered out. 
 *
 * This snippet only works with Charitable 1.3+. 
 */
function ed_prevent_text_sanitization_of_campaign_description() {
    remove_filter( 'charitable_sanitize_campaign_meta_campaign_description', array( 'Charitable_Campaign', 'sanitize_campaign_description' ) );
}

add_action( 'plugins_loaded', 'ed_prevent_text_sanitization_of_campaign_description' );
