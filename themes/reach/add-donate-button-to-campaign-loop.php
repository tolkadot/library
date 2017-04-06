<?php

/**
 * Reach does not show the campaign's donate button or link in the grid/loop.
 *
 * This snippet adds it in.
 */
function ed_charitable_add_donate_button_to_loop() {
    add_action( 'charitable_campaign_content_loop_after', 'charitable_template_campaign_loop_donate_link', 4 );
}

add_action( 'after_setup_theme', 'ed_charitable_add_donate_button_to_loop' );
