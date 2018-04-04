<?php
/**
 * In this example, we shuffle the order of things on the campaign page.
 * We move the short description and the campaign stats block to *after*
 * the Extended Description.
 */
function ed_charitable_move_description_summary_after_content() {
    remove_action( 'charitable_campaign_content_before', 'charitable_template_campaign_description', 4 );
    remove_action( 'charitable_campaign_content_before', 'charitable_template_campaign_summary', 6 );
    add_action( 'charitable_campaign_content_after', 'charitable_template_campaign_description', 1 );
    add_action( 'charitable_campaign_content_after', 'charitable_template_campaign_summary', 2 );
}

add_action( 'after_setup_theme', 'ed_charitable_move_description_summary_after_content', 11 ); 
