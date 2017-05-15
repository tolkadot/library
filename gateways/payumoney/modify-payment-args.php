<?php 

/**
 * Modify one or more arguments to be sent to PayUMoney.
 *
 * These are the argument keys that are sent to PayUMoney: 
 *
 * 'key'               
 * 'txnid'             
 * 'amount'            
 * 'productinfo'       
 * 'firstname'         
 * 'lastname'          
 * 'address1'          
 * 'address2'          
 * 'city'              
 * 'state'             
 * 'country'           
 * 'zipcode'           
 * 'email'             
 * 'phone'             
 * 'udf1'              
 * 'surl'              
 * 'furl'              
 * 'hash'              
 * 'service_provider'
 *
 * @param   array               $args
 * @param   Charitable_Donation $donation
 * @return  array
 */
function ed_charitable_change_payumoney_redirect_args( $args, Charitable_Donation $donation ) {
 
    /**
     * You can change a specific argument by referencing the key (listed above)
     * in the $args array.
     *
     * For example, let's add a 8% surcharge to the amount as an additional fee 
     * for donors.
     */
    $args['amount'] = charitable_sanitize_amount( (string) ( $args['amount'] * 1.08 ) );

    return $args;

}

add_filter( 'charitable_payu_redirect_args', 'ed_charitable_change_payumoney_redirect_args', 10, 2 );
