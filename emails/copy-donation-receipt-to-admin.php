<?php 
/**
 * Send the donation receipt to the site admin as well.
 *
 * @param   string|string[] $recipients
 * @return  string[] $recipients
 */
function en_copy_donation_receipt_to_admin( $recipients ) {

    /** 
     * If it isn't an array, cast it to one. 
     */
    if ( ! is_array( $recipients ) ) {
        $recipients = (array) $recipients;
    }    

    /**
     * Add the admin email address. To user a different 
     * email address, just replace get_option( 'admin_email' )
     * with the email address you want to add. For example: 
     * 'eddie@example.com' 
     *
     * Note: The quote marks are required.
     */
    $recipients[] = get_option( 'admin_email' );

    return $recipients;
}

add_filter( 'charitable_email_donation_receipt_receipient', 'en_copy_donation_receipt_to_admin' );