<?php
/**
 * If you want to remove all the donation stats shown on
 * campaign pages, the snippet below will do that.
 */
function ed_unhook_default_template_functions() {
	remove_action( 'charitable_campaign_summary', 'reach_template_campaign_stats', 6 );
}

add_action( 'after_setup_theme', 'ed_unhook_default_template_functions', 21 );