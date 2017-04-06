<?php 

/**
 * Move the donate button on the campaign page.
 *
 * You can drop this code snippet directly into the child theme's functions.php file.
 *
 * @see     demo.wpcharitable.com/reach/documentation/how-to-use-the-child-theme/
 */
function reach_move_donate_button() {
    remove_action( 'charitable_campaign_summary', 'charitable_template_donate_button', 2 );
    
    // To place it underneath the sharing icons, uncomment this:
    // add_action( 'charitable_campaign_summary_after', 'charitable_template_donate_button', 4 ); 

    // To place it underneath the stats, but before the sharing icons, uncomment this:
    // add_action( 'charitable_campaign_summary', 'charitable_template_donate_button', 12 );   
}

add_action( 'after_setup_theme', 'reach_move_donate_button', 30 );
