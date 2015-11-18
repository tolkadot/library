<?php 
/**
 * Move the campaign summary block (funds raised, number of donors, etc) to below the 
 * extended description area.
 */
function en_move_campaign_summary_block() {
    remove_action( 'charitable_campaign_content_before', 'charitable_template_campaign_summary', 6 );
    add_action( 'charitable_campaign_content_after', 'charitable_template_campaign_summary', 2 );
}

add_action( 'plugins_loaded', 'en_move_campaign_summary_block' );