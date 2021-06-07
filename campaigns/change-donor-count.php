<?php
/**
 * In this example, the donor count is changed for a specific campaign
 * with an ID of 123. The donor count is incremented by 45.
 */
add_filter( 'charitable_campaign_donor_count', function( $count, $campaign ) {
    if ( 123 === $campaign->ID ) {
        $count += 45;
    }

    return $count;
}, 10, 2 );
