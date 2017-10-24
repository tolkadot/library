<?php

/**
 * Reach does not show the campaign's read more ink in the grid/loop.
 *
 * This snippet adds it in.
 */
function ed_charitable_add_read_more_link_to_loop( $campaign ) {
    charitable_template( 'campaign-loop/more-link.php', array( 'campaign' => $campaign ) );
}

add_action( 'charitable_campaign_content_loop_after', 'ed_charitable_add_read_more_link_to_loop', 5 );
