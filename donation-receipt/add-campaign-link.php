<?php 
/**
 * Add a link back to the campaign from the donation receipt.
 */
function ed_add_campaign_link_to_receipt( $donation ) {
    $campaigns = $donation->get_campaign_donations();

    // We're just linking to the first campaign.
    $campaign_donation = current( $campaigns );

    ob_start();
?>    
<p><a href="<?php echo get_permalink( $campaign_donation->campaign_id ) ?>"><?php printf( __( 'Back to %s', 'your-namespace' ), $campaign_donation->campaign_name ) ?></a></p>
<?php
    echo ob_get_clean();
}

add_action( 'charitable_donation_receipt_before', 'ed_add_campaign_link_to_receipt' );