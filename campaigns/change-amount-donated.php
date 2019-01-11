<?php

/**
 * This code snippet shows how you can change what amount is shown as donated for a particular campaign.
 *
 * @param   string              $amount   The default amount.
 * @param   Charitable_Campaign $campaign The campaign we're getting this for.
 * @param   boolean             $sanitize Whether the sanitize the amount.
 * @return  string
 */
function ed_charitable_change_donated_amount( $amount, Charitable_Campaign $campaign, $sanitize ) {

    $amount = $amount * 0.9;

    if ( $sanitize ) {
        $amount = charitable_sanitize_amount( $amount );
    }

    return $amount;

}

add_filter( 'charitable_campaign_donated_amount', 'ed_charitable_change_donated_amount', 10, 3 );
