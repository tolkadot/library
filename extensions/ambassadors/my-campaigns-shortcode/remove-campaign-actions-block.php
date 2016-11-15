<?php 

/**
 * Remove the actions block included for each campaign in the My Campaigns shortcode.
 *
 * @param   Charitable_Ambassadors_Shortcodes $class
 * @return  void
 */
function ed_remove_my_campaigns_actions_block( Charitable_Ambassadors_Shortcodes $class ) {
    remove_action( 'charitable_user_campaign_summary_after', array( $class, 'render_campaign_actions' ), 10, 2 );
}

add_action( 'charitable_ambassadors_shortcodes_start', 'ed_remove_my_campaigns_actions_block' );