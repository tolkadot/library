<?php 

/**
 * Unhook default Charitable template functions.
 *
 * In this example, we're going to remove the donor count from the campaign
 * page, but you can adapt this to unhook any template functions that are 
 * added by Charitable. 
 *
 * You can find all of the template hooks defined in Charitable in 
 * charitable/includes/public/charitable-template-hooks.php
 *
 * Hooks are all defined using an `add_action()` or `add_filter()` function. 
 * To unhook a particular action/filter, copy and paste the entire line into
 * the function body below, and replace 'add' with 'remove'. See the example
 * below to understand how this works.
 *
 * @see     https://codex.wordpress.org/Function_Reference/remove_action
 * @see     https://codex.wordpress.org/Function_Reference/remove_filter
 */
function ed_unhook_default_template_functions() {

    /** 
     * This hook is defined on line 70 of charitable/includes/public/charitable-template-hooks.php
     * 
     * The original `add_action()` call looks like this: 
     * add_action( 'charitable_campaign_summary', 'charitable_template_campaign_donor_count', 8 ); 
     *
     * To unhook it, we copy this line entirely and change 'add' to 'remove'.
     */
    remove_action( 'charitable_campaign_summary', 'charitable_template_campaign_donor_count', 8 );

}

add_action( 'after_setup_theme', 'ed_unhook_default_template_functions', 11 ); 