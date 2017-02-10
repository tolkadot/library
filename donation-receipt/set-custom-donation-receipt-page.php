<?php 

/**
 * You can set a custom donation receipt page, including a page
 * that is not on your own website.
 *
 * Note that if you just want to use a different page on your 
 * site, you don't need to use this snippet. Instead, follow the 
 * guide at https://www.wpcharitable.com/documentation/customizing-the-donation-receipt-page/
 * to select your own page.
 */
function ed_charitable_set_custom_donation_receipt_page( $page, $args ) {
    /** 
     * Note: If you just copy and paste this example, www.opera.com
     * just loads a blank page, but that's not a fault of the script.
     *
     * Oh, and why www.opera.com? Because Opera is a pretty great
     * little browser, with a built-in VPN and Ad Blocker. :)
     */
    return 'http://www.opera.com';
}

add_filter( 'charitable_permalink_donation_receipt_page', 'ed_charitable_set_custom_donation_receipt_page', 10, 2 );
