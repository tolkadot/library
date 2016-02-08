<?php
/**
 * Remove the campaign descriptions from the campaign loop.
 */
function en_remove_campaign_description_in_loop() {
    remove_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_description', 4 );
}

add_action( 'plugins_loaded', 'en_remove_campaign_description_in_loop' );
