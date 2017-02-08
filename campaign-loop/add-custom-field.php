<?php

/**
 * Display the custom field.
 *
 * @param   Charitable_Campaign $campaign
 * @return  void
 */
function ed_charitable_add_custom_field_to_campaign_grid( $campaign ) {
    echo $campaign->get( 'my_custom_field' );
}

/**
 * You can adjust where the custom field is inserted by changing the priority, 
 * the third parameter used in the add_action() function.
 *
 * Here are the priorities of the other bits included in the campaign grid widgets:
 *
 * 4 = description
 * 6 = progress bar
 * 8 = donation stats
 * 10 = donate link or read more link
 * 10 = read more link 
 *
 * In this example, we use a priority of 2, which places our custom field before
 * the description, right after the campaign title.
 */
add_action( 'charitable_campaign_content_loop_after', 'ed_charitable_add_custom_field_to_campaign_grid', 2 );
