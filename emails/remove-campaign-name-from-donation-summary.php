<?php
/**
 * This example shows how to change the output of the line items 
 * displayed by the donation summary in email receipts. In this example,
 * we simply display the total amount donated on each line. 
 *
 * @param   string $line_item The default output provided by Charitable.
 * @param   Object $campaign_donation A single record from the wp_charitable_campaign_donations table.
 * @return  string
 */
function en_filter_email_donation_summary_line_item( $line_item, $campaign_donation ) {

    $line_item = charitable_format_money( $campaign_donation->amount );
    $line_item .= PHP_EOL; // Be sure to add this to force each line item onto a new line.

    return $line_item;
    
}

add_filter( 'charitable_donation_summary_line_item_email', 'en_filter_email_donation_summary_line_item', 10, 2 );