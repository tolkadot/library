<?php 

/**
 * In Easy Digital Downloads, you can add your own email tags to include 
 * in purchase receipts & notifications.
 *
 * In this example, we add a tag that allows you to include the list of 
 * campaigns that received donation through the purchase, including 
 * how much they received.
 */

/**
 * Register the tag.
 *
 * Note that the first parameter passed to the edd_add_email_tag() function 
 * will be the name of the tag. So in this case, you would use this tag 
 * in your email like this: {campaign_donations}
 * 
 * @see     http://docs.easydigitaldownloads.com/article/497-edd-add-email-tag
 * @param   int $payment_id
 */
function ed_charitable_edd_add_campaign_donations_email_tag( $payment_id ) {
     edd_add_email_tag( 'campaign_donations', 'Display the list of campaigns that were donated to, and how much they received.', 'ed_charitable_edd_print_payment_donations' );
}

add_action( 'edd_add_email_tags', 'ed_charitable_edd_add_campaign_donations_email_tag' );

/**
 * Define the output of the tag.
 *
 * @param   int $payemtn_id
 * @return  string
 */
function ed_charitable_edd_print_payment_donations( $payment_id ) {
    $output = '';
  
    $campaign_donations = Charitable_EDD_Payment::get_instance()->get_campaign_donations_through_payment( $payment_id );
    
    if ( ! $campaign_donations ) {
        return $output;
    }
  
    foreach ( $campaign_donations as $campaign_donation ) {

        /** 
         * Variables you can use:
         *
         * $campaign_donation->campaign_name = The name of the campaign that received a donation.
         * $campaign_donation->campaign_id   = The ID of the campaign that received a donation.
         * $campaign_donation->donation_id   = The ID of the donation.
         * $campaign_donation->amount        = The amount donated.
         */
        $output .= $campaign_donation->campaign_name . ': ' . charitable_format_money( $campaign_donation->amount ) . PHP_EOL;

    }
  
    return $output;
}