<?php 
/**
 * Remove the campaign summary block (funds raised, number of donors, etc).
 */
function en_remove_campaign_summary_block() {
    remove_action( 'charitable_campaign_content_before', 'charitable_template_campaign_summary', 6 );

    // If you still want to show a Donate button, uncomment the line below.
    // add_action( 'charitable_campaign_content_before', 'charitable_template_donate_button', 6 );
}

add_action( 'after_setup_theme', 'en_remove_campaign_summary_block', 11 );