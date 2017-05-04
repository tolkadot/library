<?php 

/**
 * Remove templates added by the parent theme.
 *
 * You can find other actions to unhook at https://github.com/Charitable/Reach/blob/master/inc/charitable/functions/template-hooks.php
 *
 * When a hook is added in Reach, it's added like this:
 *
 * add_filter
 * add_action
 *
 * To then unhook it, copy and paste the entire line and replace add_ with remove_
 *
 * In other words, this:
 *
 * add_action( 'charitable_campaign_content_loop_after', 'reach_template_campaign_loop_creator', 8 );
 *
 * Is unhooked by:
 *
 * remove_action( 'charitable_campaign_content_loop_after', 'reach_template_campaign_loop_creator', 8 );
 */
function reach_unhook_template_actions() {
    remove_action( 'charitable_campaign_content_loop_after', 'reach_template_campaign_loop_creator', 8 );
}

add_action( 'after_setup_theme', 'reach_unhook_template_actions', 30 );