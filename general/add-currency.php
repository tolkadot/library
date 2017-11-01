<?php
/** 
 * Add a new currency.
 *
 * @param  string[] $currencies The list of registered currencies.
 * @return string[]
 */ 
function ed_charitable_add_currency( $currencies ) {
    /** 
     * We're adding the Armenian Dram currency (AMD).
     *
     * Note that the three-letter currency code is on the left as
     * the 'key' of the currency. This is important as it is what
     * will be sent to payment gateways.
     */
    $currencies['AMD'] = sprintf( __( 'Armenian Dram (%s)', 'charitable' ), charitable_get_currency_helper()->get_currency_symbol( 'AMD' ) );

    return $currencies;
}

add_filter( 'charitable_currencies', 'ed_charitable_add_currency' );

/**
 * Set a symbol for the currency.
 *
 * @param  string $symbol   The currency symbol.
 * @param  string $currency The currency code.
 * @return string
 */
function ed_charitable_set_currency_symbol( $symbol, $currency ) {
    if ( 'AMD' == $currency ) {
        $symbol = '&#1423;';
    }

    return $symbol;
}

add_filter( 'charitable_currency_symbol', 'ed_charitable_set_currency_symbol', 10, 2 );
