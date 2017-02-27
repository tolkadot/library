<?php 

/**
 * This code snippet builds on the example provided in the EDD 
 * snippets library: 
 * 
 * https://github.com/easydigitaldownloads/library/blob/master/checkout/add-custom-field.php
 *
 * The key addition here is that we have added a check for whether a 
 * certain campaign is receiving a donation as part of the campaign. 
 * This allows you to add a custom field to purchases when a specific 
 * campaign is receiving funds.
 */

/**
 * Get the IDs of the campaigns that are receiving donations in this purchase.
 */
function ed_charitable_get_campaigns_receiving_donations_in_cart() {
    $cart      = new Charitable_EDD_Cart( edd_get_cart_contents(), edd_get_cart_fees( 'item' ) );
    $campaigns = $cart->get_benefits_by_campaign();
    return array_keys( $campaigns );
}

/**
 * Checks whether the cart includes a donation to a specific campaign.
 *
 * @param int $campaign_id
 */
function ed_charitable_includes_donation_to_campaign( $campaign_id ) {
    return in_array( $campaign_id, ed_charitable_get_campaigns_receiving_donations_in_cart() ); 
}

/**
 * Display phone number field at checkout
 * Add more here if you need to
 */
function sumobi_edd_display_checkout_fields() {

    /* If this cart does not include a donation to campaign with ID 123, don't add the field. */
    if ( ! ed_charitable_includes_donation_to_campaign( 723 ) ) {
        return;
    }
?>
    <p id="edd-phone-wrap">
        <label class="edd-label" for="edd-phone">
            <?php echo 'Phone Number'; ?>
        </label>
        <span class="edd-description">
            <?php echo 'Enter your phone number so we can get in touch with you.'; ?>
        </span>
        <input class="edd-input" type="text" name="edd_phone" id="edd-phone" placeholder="<?php echo 'Phone Number'; ?>" />
    </p>
    <?php
}
add_action( 'edd_purchase_form_user_info_fields', 'sumobi_edd_display_checkout_fields' );

/**
 * Make phone number required
 * Add more required fields here if you need to
 */
function sumobi_edd_required_checkout_fields( $required_fields ) {
    
    /* If this cart does not include a donation to campaign with ID 123, don't add the field. */
    if ( ! ed_charitable_includes_donation_to_campaign( 723 ) ) {
        return $required_fields;
    }
  
    $required_fields = array(
        'edd_phone' => array(
            'error_id' => 'invalid_phone',
            'error_message' => 'Please enter a valid Phone number'
        ),
    );

    return $required_fields;
}
add_filter( 'edd_purchase_form_required_fields', 'sumobi_edd_required_checkout_fields' );

/**
 * Set error if phone number field is empty
 * You can do additional error checking here if required
 */
function sumobi_edd_validate_checkout_fields( $valid_data, $data ) {

    /* If this cart does not include a donation to campaign with ID 123, don't add the field. */
    if ( ! ed_charitable_includes_donation_to_campaign( 723 ) ) {
        return;
    }
  
    if ( empty( $data['edd_phone'] ) ) {
        edd_set_error( 'invalid_phone', 'Please enter your phone number.' );
    }
}
add_action( 'edd_checkout_error_checks', 'sumobi_edd_validate_checkout_fields', 10, 2 );

/**
 * Store the custom field data into EDD's payment meta
 */
function sumobi_edd_store_custom_fields( $payment_meta ) {
    $payment_meta['phone'] = isset( $_POST['edd_phone'] ) ? sanitize_text_field( $_POST['edd_phone'] ) : '';
    
    return $payment_meta;
}
add_filter( 'edd_payment_meta', 'sumobi_edd_store_custom_fields');


/**
 * Add the phone number to the "View Order Details" page
 */
function sumobi_edd_view_order_details( $payment_meta, $user_info ) {
    $phone = isset( $payment_meta['phone'] ) ? $payment_meta['phone'] : 'none';
?>
    <div class="column-container">
        <div class="column">
            <strong><?php echo 'Phone: '; ?></strong>
             <?php echo $phone; ?>  
        </div>
    </div>
<?php
}
add_action( 'edd_payment_personal_details_list', 'sumobi_edd_view_order_details', 10, 2 );

/**
 * Add a {phone} tag for use in either the purchase receipt email or admin notification emails
 */
edd_add_email_tag( 'phone', 'Customer\'s phone number', 'sumobi_edd_email_tag_phone' );

/**
 * The {phone} email tag
 */
function sumobi_edd_email_tag_phone( $payment_id ) {
    $payment_data = edd_get_payment_meta( $payment_id );
    return isset( $payment_data['phone'] ) ? $payment_data['phone'] : '';
}
