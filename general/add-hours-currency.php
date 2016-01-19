<?php 

/** 
 * Add a custom currency called "Hours". 
 *
 * @param   string[] $currencies
 * @return  string[] $currencies
 */ 
function en_add_hours_currency( $currencies ) {
    $currencies[ 'HOURS' ] = __( 'Hours', 'your-namespace' );
    return $currencies;
}

add_filter( 'charitable_currencies', 'en_add_hours_currency' );