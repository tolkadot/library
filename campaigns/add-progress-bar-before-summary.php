<?php 
/**
 * Add a progress bar to the individual campaign pages.
 */
function en_add_progress_bar_before_summary() {
    add_action( 'charitable_campaign_content_before', 'charitable_template_campaign_progress_bar', 5 );
}

add_action( 'plugins_loaded', 'en_add_progress_bar_before_summary' );