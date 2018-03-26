<?php
/**
 * Remove the progress bar and funds raised from the campaigns grid/loop.
 */
function ed_charitable_remove_campaign_stats_in_loop() {
	remove_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_progress_bar', 6 );
	remove_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_loop_donation_stats', 8 );
}

add_action( 'after_setup_theme', 'ed_charitable_remove_campaign_stats_in_loop', 20 );