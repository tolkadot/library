<?php 
/**
 * Add a featured image to the individual campaign pages.
 *
 * @param   Charitable_Campaign $campaign
 */
function en_add_campaign_featured_image( Charitable_Campaign $campaign ) {
    if ( has_post_thumbnail( $campaign->ID ) ) {
        the_post_thumbnail( $campaign->ID );
    }
}

add_action( 'charitable_campaign_content_before', 'en_add_campaign_featured_image', 2 );