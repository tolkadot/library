<?php 
/**
 * Remove the campaign summary block (funds raised, number of donors, etc).
 */
function en_remove_campaign_summary_block() {
    remove_action( 'charitable_campaign_content_before', 'charitable_template_campaign_summary', 6 );
}

add_action( 'plugins_loaded', 'en_remove_campaign_summary_block' );