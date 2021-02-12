<?php
/**
 * In this example, the various parts shown for each campaign in the campaign grid
 * are re-ordered.
 *
 * The parts are added using the add_action() function in WordPress. The order is determined by
 * the priority given when calling add_action().
 *
 * To re-order the parts, you first need to call remove_action(), which undoes the add_action()
 * calls made in Charitable and Reach itself. Then, you can re-add the parts using add_action(),
 * being sure to specify the priority so that they are displayed in the order you want. Lower
 * numbers are shown earlier.
 *
 * In the example below, we show the stats, then the progress bar, then the description, and then
 * the name of the campaign creator.
 *
 * @see https://developer.wordpress.org/reference/functions/add_action/
 * @see https://developer.wordpress.org/reference/functions/remove_action/
 */
function ed_reach_reorder_campaign_loop_parts() {
    /* Remove the callbacks from when they are currently called. */
    remove_action( 'charitable_campaign_content_loop_after', 'reach_template_campaign_loop_creator', 8 );
    remove_action( 'charitable_campaign_content_loop_after', 'reach_template_campaign_loop_stats', 6 );
    remove_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_description', 4 );

    /* Add them in the order you prefer by changing the priority argument (the number). Lower numbers are shown earlier. */
    add_action( 'charitable_campaign_content_loop_after', 'reach_template_campaign_loop_stats', 2 );
    add_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_progress_bar', 4 );
    add_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_description', 6 );
    add_action( 'charitable_campaign_content_loop_after', 'reach_template_campaign_loop_creator', 8 );
}

add_action( 'after_setup_theme', 'ed_reach_reorder_campaign_loop_parts', 30 );