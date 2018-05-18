<?php 

/**
 * Modify one or more arguments to be sent to PayFast.
 *
 * These are the argument keys that are sent to PayFast: 
 *
 * 'merchant_id'      
 * 'merchant_key'     
 * 'return_url'       
 * 'cancel_url'       
 * 'notify_url'       
 * 'name_first'       
 * 'name_last'        
 * 'email_address'    
 * 'm_payment_id'     
 * 'amount'           
 * 'item_name'        
 * 'item_description' 
 * 'custom_int1'
 *
 * @param   array               $args
 * @param   Charitable_Donation $donation
 * @return  array
 */
function ed_charitable_change_payfast_redirect_args( $args, Charitable_Donation $donation ) {
 
    /**
     * You can change a specific argument by referencing the key (listed above)
     * in the $args array.
     *
     * For example, let's change the URL that donors are returned to if they
     * cancel their donation in PayFast.
     */
    $args['cancel_url'] = 'https://example.co.za/donate/?cancel=1&donation_id=' . $donation->ID;

    return $args;

}

add_filter( 'charitable_payfast_redirect_args', 'ed_charitable_change_payfast_redirect_args', 10, 2 );
