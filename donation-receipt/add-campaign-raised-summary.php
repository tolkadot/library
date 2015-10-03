<?php 
/**
 * Add a short summary after the donation details showing the funds raised by each campaign.
 */
function ed_add_campaign_stats_to_receipt( $donation ) {
    $campaigns = $donation->get_campaign_donations();

    ob_start();

    printf( '<h4>%s</h4>', __( 'Campaign Stats' ) );

    foreach ( $campaigns as $campaign_donation ) {
        $campaign = charitable_get_campaign( $campaign_donation->campaign_id );        

        printf( '<p><strong>%s</strong></p>', $campaign_donation->campaign_name );

        charitable_template_campaign_donation_summary( $campaign );
    }

    echo ob_get_clean();
}

add_action( 'charitable_donation_receipt_after', 'ed_add_campaign_stats_to_receipt' );